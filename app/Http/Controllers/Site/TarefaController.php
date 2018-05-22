<?php

namespace App\Http\Controllers\Site;

use App\Notifications\NovaTarefaUsuario;
use App\Events\NovaTarefaUsuario as NewTarefaUsuario;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\NotificacaoTarefaEmail;
use App\Exceptions\Handler;
use App\Pessoa;
use App\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas/tarefasList', compact('tarefas'));
    }

    public function getData(Request $request){
        $dadosTarefas = Tarefa::query();
        
        if($request->periodo){
            $dadosTarefas->whereMonth('data',$request->periodo);
        }
        if($request->quantidadepessoas){
            $dadosTarefas
            ->select(DB::raw('count(pessoa_id) as conte, titulo, descricao, tarefas.id, data'))
            ->join('pessoa_tarefa','pessoa_tarefa.tarefa_id', '=', 'tarefas.id')
            ->groupBy('tarefa_id')
            ->having('conte', '>=', $request->quantidadepessoas);
            // dd($dadosTarefas->toSql());
        }
        return DataTables::of($dadosTarefas)->make(true);
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        return view('tarefas/tarefasCreate', compact('pessoas'));
    }

    public function store(Request $request)
    {
        try{
            $tarefa = new Tarefa($request->all());
            $tarefa->data = Carbon::createFromFormat('m/d/Y',$tarefa->data);
            $user = Auth::user();
            $tarefa->user_id = Auth::id();
            $tarefa->save();

            $tarefa->pessoas()->attach($request->pessoas_id);
            
            $user->notify(new NovaTarefaUsuario());  
            
            // $this->dispatch(new NotificacaoTarefaEmail($tarefa))->delay(60);

            $job = (new NotificacaoTarefaEmail($tarefa))->onQueue('teste')->delay($tarefa->data);
            $this->dispatch($job);
            
            event(new NewTarefaUsuario($tarefa));
            return view('tarefas/tarefasStore', compact('pessoas', 'tarefas'));
        } catch(\Exception $e) {
            dd($e->getMessage().'<br>'.$e->getFile().'<br>'.$e->getLine());
        }

    }

    public function show(Request $request, $id)
    {
        $tarefas = Tarefa::findOrFail($id);

        return view('tarefas/tarefasShow', compact('tarefas'));
    }

    public function delete($id)
    {
        try{
            Tarefa::findOrFail($id)->delete();
            return ['type' => 'success',  'message' => 'Tudo certo'];
        }
        catch(\Exception $e){
            return ['type' => 'error',  'message' => $e->getMessage()];
        }

    }

    public function edit($id)
    {
        $pessoas = Pessoa::all();
        $tarefas = Tarefa::findOrFail($id);
        return view('tarefas/tarefasEdit', compact('tarefas', 'pessoas'));
    }

    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::find($id);

        $tarefa->titulo    = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data      = $request->data;

        $tarefa->save();

        $tarefa->pessoas()->sync($request->pessoas_id);
        
        return view('tarefas/tarefasUpdate');
    }

    public function mostrarPessoas($id){
        $tarefas = Tarefa::find($id);
        $pessoas = $tarefas->pessoas;

        return view('tarefas/mostrarPessoas', compact('pessoas','tarefas'));
    }
}
