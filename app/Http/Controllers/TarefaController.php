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

    public function show($id)
    {
        return view('tarefasShow',['tarefas' => Tarefa::findOrFail($id)]);
    }

    public function delete($id)
    {
        return view('tarefasDelete',['tarefas' => Tarefa::findOrFail($id)->delete($id)]);
    }

    public function editar($id)
    {
        $tarefas = Tarefa::findOrFail($id);
        return view('tarefasEditar', compact('tarefas'));
    }

    public function update(Request $request)
    {
        $tarefas = Tarefa::findOrFail($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data = $request->data;
        $tarefa->save();

        return view('tarefasUpdate');
    }
}
