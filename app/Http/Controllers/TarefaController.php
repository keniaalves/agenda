<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        //$tarefas = Tarefa::orderBy('created_at', 'desc')->paginate(10);
        $tarefas = Tarefa::all();
        //return view('tarefaslist',['tarefas' => $tarefas]);
        return view('tarefaslist', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefascreate');
    }
}
