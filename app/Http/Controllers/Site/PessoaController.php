<?php

namespace App\Http\Controllers\Site;

use App\User;
use App\Pessoa;
use App\Tarefa;
use App\Jobs\ConvidaPessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();

        return view('pessoas/pessoasList', compact('pessoas'));
    }

    public function getData()
    {
        $dadosPessoas = Pessoa::query();

        return DataTables::of($dadosPessoas)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarefas = Tarefa::all();

        return view('pessoas/pessoasCreate', compact('tarefas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $pessoa              = new Pessoa($request->all());
            $data                = Carbon::createFromFormat('m/d/Y', $pessoa->aniversario);
            $pessoa->aniversario = $data;
            $pessoa->save();

            $pessoa->tarefas()->attach($request->tarefas_id);

            $user = User::where('users.email', '=', $request->email)->get();

            if (!empty($user->all())) {
                $job = (new ConvidaPessoa($pessoa))->onQueue('convida');
                $this->dispatch($job);
            }

            return view('pessoas/pessoasStore', compact('tarefas'));
        } catch (Exception $e) {
            dd($e->getMessage() . '<br>' . $e->getFile() . '<br>' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pessoas/pessoasShow', ['pessoas' => Pessoa::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefas  = Tarefa::all();
        $pessoas  = Pessoa::findOrFail($id);

        $data                 = Carbon::createFromFormat('Y-m-d', $pessoas->aniversario);
        $pessoas->aniversario = $data->format('m/d/Y');

        return view('pessoas/pessoasEdit', compact('pessoas', 'tarefas'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);

        $pessoa->nome        = $request->nome;
        $data                = Carbon::createFromFormat('m/d/Y', $request->aniversario);
        $pessoa->aniversario = $data->format('m/d/Y');

        $pessoa->telefone    = $request->telefone;

        $pessoa->save();

        $pessoa->tarefas()->sync($request->tarefas_id);

        return view('pessoas/pessoasUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            Pessoa::findOrFail($id)->delete();

            return ['type' => 'success',  'message' => 'Tudo certo'];
        } catch (\Exception $e) {
            return ['type' => 'error',  'message' => $e->getMessage()];
        }
    }

    public function mostrarTarefas($id)
    {
        $pessoas = Pessoa::find($id);
        $tarefas = $pessoas->tarefas;

        return view('pessoas/mostrarTarefas', compact('tarefas', 'pessoas'));
    }
}
