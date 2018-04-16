<?php

namespace App\Http\Controllers\Site;

use App\Pessoa;
use App\Tarefa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->aniversario = $request->aniversario;
        $pessoa->telefone = $request->telefone;
        $pessoa->save();

        return view('pessoas/pessoasStore');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pessoas/pessoasShow',['pessoas' => Pessoa::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoas = Pessoa::findOrFail($id);
        return view('pessoas/pessoasEdit', compact('pessoas')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);

        $pessoa->nome = $request->nome;
        $pessoa->aniversario = $request->aniversario;
        $pessoa->telefone = $request->telefone;

        $pessoa->save();
        
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
        return view('pessoas/pessoasDelete',['pessoas' => Pessoa::findOrFail($id)->delete($id)]);
    }

    public function mostrarTarefas($id){
        $pessoas = Pessoa::find($id);
        $tarefas = $pessoas->tarefas;

        return view('pessoas/mostrarTarefas', compact('tarefas', 'pessoas'));
    }
}
