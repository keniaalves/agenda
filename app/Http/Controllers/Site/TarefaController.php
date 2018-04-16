<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
        return view('tarefas/tarefasCreate');
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa;
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data = $request->data;
        $tarefa->save();

        return view('tarefas/tarefasStore');
    }

    public function show(Request $request, $id)
    {
        return view('tarefas/tarefasShow',['tarefas' => Tarefa::findOrFail($id)]);
    }

    public function delete($id)
    {
        return view('tarefas/tarefasDelete',['tarefas' => Tarefa::findOrFail($id)->delete($id)]);
    }

    public function edit($id)
    {
        $tarefas = Tarefa::findOrFail($id);
        return view('tarefas/tarefasEdit', compact('tarefas'));
    }

    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::find($id);

        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data = $request->data;

        $tarefa->save();
        
        return view('tarefas/tarefasUpdate');
    }

    public function mostrarPessoas($id){
        $tarefas = Tarefa::find($id);
        $pessoas = $tarefas->pessoas;

        return view('tarefas/mostrarPessoas', compact('pessoas','tarefas'));
    }
}
