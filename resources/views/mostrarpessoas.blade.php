@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefa</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Pessoas envolvidas na tarefa</strong></li>
                        @forelse($pessoas as $pessoas)
                        <li class="list-group-item"><strong>ID Pessoa: </strong>{{ $pessoas->id}} - <strong>Nome Pessoa:</strong> {{ $pessoas->nome}}</li>
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