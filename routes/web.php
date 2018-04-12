<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('tarefasList', 'TarefaController@index')->name('tarefasList');

Route::get('tarefasCreate', 'TarefaController@create')->name('tarefasCreate');

Route::post('tarefasStore', 'TarefaController@store')->name('tarefasStore');

Route::get('tarefasShow/{id}', 'TarefaController@show')->name('tarefasShow');

Route::delete('tarefasDelete/{id}', 'TarefaController@delete')->name('tarefasDelete');

Route::put('tarefasEditar/{id}', 'TarefaController@editar')->name('tarefasEditar');

Route::put('tarefasAtualizar/{id}', 'TarefaController@atualizar')->name('tarefasAtualizar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
