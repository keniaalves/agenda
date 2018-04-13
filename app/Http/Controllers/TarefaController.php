<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefasList', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefasCreate');
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa;
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data = $request->data;
        $tarefa->save();

        return view('tarefasStore');
    }

    public function show(Request $request, $id)
    {
        return view('tarefasShow',['tarefas' => Tarefa::findOrFail($id)]);
    }

    public function delete($id)
    {
        return view('tarefasDelete',['tarefas' => Tarefa::findOrFail($id)->delete($id)]);
    }

    public function edit($id)
    {
        //return view('tarefasEdit', ['tarefas' => Tarefa::findOrFail($id)]);
        $tarefas = Tarefa::findOrFail($id);
        return view('tarefasEdit', compact('tarefas'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefas = Tarefa::findOrFail($id);
        $tarefa->titulo = Request::input('titulo');
        $tarefa->descricao = Request::input('descricao');
        $tarefa->data = Request::input('data');
        $tarefa->save();

        return view('tarefasUpdate', ['tarefas' => Tarefa::findOrFail($id)]);
        //return view('tarefasUpdate');
    }
}
