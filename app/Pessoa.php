<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes; 

    public $fillable = 
    [
        'nome',
        'aniversario',
        'telefone'
    ];
    
    public $guarded = 
    [
        'id', 
        'created_at', 
        'update_at'
    ];

    protected $dates = 
    [
        'deleted_at'
    ];

    public $table = 'pessoas'; 

    public function tarefas(){
        return $this->belongsToMany(Tarefa::class);
    }

    public function telefone(){
        return $this->hasMany(Telefone::class, 'pessoa_id');
    }
}
