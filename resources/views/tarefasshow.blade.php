@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefa {{$tarefas->id}}</div>

                <div class="card-body">
                <ul class="list-group">
                <li class="list-group-item"><strong>Tarefa de número {{ $tarefas->id}}</strong></li>
                    <li class="list-group-item"><strong>Tiitulo da tarefa: </strong>{{ $tarefas->titulo}}</li>
                    <li class="list-group-item"><strong>Data e hora da tarefa: </strong>{{ $tarefas->data}}</li>
                    <li class="list-group-item"><strong>Descricao da tarefa: </strong>{{ $tarefas->descricao}}</li>
                    <li class="list-group-item"><strong>Data de criacao da tarefa: </strong>{{ $tarefas->created_at}}</li>
                    <li class="list-group-item"><strong>Data de alteracao da tarefa: </strong>{{ $tarefas->updated_at}}</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection