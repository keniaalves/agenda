@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Suas Tarefas</div>

                <div class="card-body">
                @forelse($tarefas as $tarefas)
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('/tarefasShow', $tarefas->id) }}">{{ $tarefas->titulo}} - {{ $tarefas->data}}</a></li>
                </ul>
                @empty
                <div class="alert alert-danger">
                    <p>Nothing to say... </p>
                </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection