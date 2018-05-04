<?php

namespace App\Http\Controllers\Site;

use App\Notifications\NovaTarefaUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pessoa;
use App\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas/tarefasList', compact('tarefas'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        return view('tarefas/tarefasCreate', compact('pessoas'));
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa($request->all());
        $tarefa->save();

        $tarefa->pessoas()->attach($request->pessoas_id);

        $user = Auth::user();
        $user->notify(new NovaTarefaUsuario());  

        return view('tarefas/tarefasStore', compact('pessoas', 'tarefas'));
    }

    public function show(Request $request, $id)
    {
        $tarefas = Tarefa::findOrFail($id);

        return view('tarefas/tarefasShow', compact('tarefas'));
    }

    public function delete($id)
    {
        return view('tarefas/tarefasDelete',['tarefas' => Tarefa::findOrFail($id)->delete($id)]);
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
