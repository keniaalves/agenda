<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['titulo','descricao','data'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tarefas';
}
