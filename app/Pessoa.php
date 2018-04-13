<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public $fillable = ['nome','aniversario','telefone'];
    public $guarded = ['id', 'created_at', 'update_at'];
    public $table = 'pessoas'; 
}
