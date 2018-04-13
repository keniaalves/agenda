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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
