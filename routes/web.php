<?php

use App\Events\NovaTarefaUsuario;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['namespace'=>'Site', 'middleware'=>'auth'], function () {
    Route::get('tarefasList', 'TarefaController@index')->name('tarefas/tarefasList');
    Route::get('tarefasCreate', 'TarefaController@create')->name('tarefas/tarefasCreate');
    Route::post('tarefasStore', 'TarefaController@store')->name('tarefas/tarefasStore');
    Route::get('tarefasShow/{id}', 'TarefaController@show')->name('tarefas/tarefasShow');
    Route::delete('tarefasDelete/{id}', 'TarefaController@delete')->name('tarefas/tarefasDelete');
    Route::get('tarefasEdit/{id}', 'TarefaController@edit')->name('tarefas/tarefasEdit');
    Route::put('tarefasUpdate/{id}', 'TarefaController@update')->name('tarefas/tarefasUpdate'); 
    
    Route::get('mostrarTarefas{id}', 'PessoaController@mostrarTarefas')->name('pessoas/mostrarTarefas');

    
    Route::get('pessoasList', 'PessoaController@index')->name('pessoas/pessoasList');
    Route::get('getData', 'PessoaController@getData')->name('pessoas/getData');
    Route::get('pessoasCreate', 'PessoaController@create')->name('pessoas/pessoasCreate');
    Route::post('pessoasStore', 'PessoaController@store')->name('pessoas/pessoasStore');
    Route::get('pessoasShow/{id}', 'PessoaController@show')->name('pessoas/pessoasShow');
    Route::delete('pessoasDelete/{id}', 'PessoaController@delete')->name('pessoas/pessoasDelete');
    Route::get('pessoasEdit/{id}', 'PessoaController@edit')->name('pessoas/pessoasEdit');
    Route::put('pessoasUpdate/{id}', 'PessoaController@update')->name('pessoas/pessoasUpdate');  

    Route::get('mostrarPessoas{id}', 'TarefaController@mostrarPessoas')->name('tarefas/mostrarPessoas');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');