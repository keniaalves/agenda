@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contato {{$pessoas->id}}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Contato de número {{ $pessoas->id}}</strong></li>
                        <li class="list-group-item"><strong>Nome: </strong>{{ $pessoas->nome}}</li>
                        <li class="list-group-item"><strong>Telefone: </strong>{{ $pessoas->telefone}}</li>
                        <li class="list-group-item"><strong>Nascimento: </strong>{{ $pessoas->aniversario}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection