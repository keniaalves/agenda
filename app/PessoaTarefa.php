<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaTarefa extends Model
{
    protected $table = 'pessoa_tarefa';

    protected $fillable = 
    [
        'pessoa_id',
        'tarefa_id'
    ];

    protected $dates = 
    [
        'deleted_at'
    ];
}
