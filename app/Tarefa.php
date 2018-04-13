<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    public $fillable = ['titulo','descricao','data'];
    public $guarded = ['id', 'created_at', 'update_at'];
    public $table = 'tarefas';
    
    public function pessoas(){
        return $this->belongsToMany(Pessoa::class);
    }
}
