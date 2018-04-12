<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('tarefaslist', 'TarefaController@index');

Route::get('tarefascreate', 'TarefaController@create')->name('tarefascreate');

Route::post('tarefasstore', 'TarefaController@store')->name('tarefasstore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
