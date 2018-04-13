<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['namespace'=>'Site', 'middleware'=>'auth'], function () {
    Route::get('tarefasList', 'TarefaController@index')->name('tarefasList');
    Route::get('tarefasCreate', 'TarefaController@create')->name('tarefasCreate');
    Route::post('tarefasStore', 'TarefaController@store')->name('tarefasStore');
    Route::get('tarefasShow/{id}', 'TarefaController@show')->name('tarefasShow');
    Route::delete('tarefasDelete/{id}', 'TarefaController@delete')->name('tarefasDelete');
    Route::get('tarefasEdit/{id}', 'TarefaController@edit')->name('tarefasEdit');
    Route::put('tarefasUpdate/{id}', 'TarefaController@update')->name('tarefasUpdate');  
    
    Route::get('pessoasList', 'PessoaController@index')->name('pessoasList');
    Route::get('pessoasCreate', 'PessoaController@create')->name('pessoasCreate');
    Route::post('pessoasStore', 'PessoaController@store')->name('pessoasStore');
    Route::get('pessoasShow/{id}', 'PessoaController@show')->name('pessoasShow');
    Route::delete('pessoasDelete/{id}', 'PessoaController@delete')->name('pessoasDelete');
    Route::get('pessoasEdit/{id}', 'PessoaController@edit')->name('pessoasEdit');
    Route::put('pessoasUpdate/{id}', 'PessoaController@update')->name('pessoasUpdate');  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
