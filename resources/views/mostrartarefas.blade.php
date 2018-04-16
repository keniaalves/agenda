@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pessoa</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Tarefas relacionadas à pessoa</strong></li>
                        @forelse($tarefas as $tarefas)
                        <li class="list-group-item"><strong>ID Tarefa: </strong>{{ $tarefas->id}} - <strong>Nome tarefa:</strong> {{ $tarefas->descricao}}</li>
                        @empty
                        <div class="alert alert-danger">
                            <p>Nothing to say... </p>
                        </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection