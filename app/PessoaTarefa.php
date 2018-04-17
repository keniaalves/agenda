<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaTarefa extends Model
{
    protected $table = 'pessoa_tarefa';

    protected $fillable = [
        'pessoa_id',
        'tarefa_id'
    ];
}
