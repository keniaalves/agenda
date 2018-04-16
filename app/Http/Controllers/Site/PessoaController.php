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
        return view('pessoasList', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoasCreate');
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

        return view('pessoasStore');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pessoasShow',['pessoas' => Pessoa::findOrFail($id)]);
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
        return view('pessoasEdit', compact('pessoas')); 
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
        
        return view('pessoasUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return view('pessoasDelete',['pessoas' => Pessoa::findOrFail($id)->delete($id)]);
    }

    public function mostrarTarefas($id){
        $pessoas = Pessoa::find($id);
        $tarefas = $pessoas->tarefas;

        return view('mostrarTarefas', compact('tarefas'));
    }
}
