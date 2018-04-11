@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Suas Tarefas</div>

                <div class="card-body">
                @forelse($tarefas as $tarefas)
                    <div class="alert alert-success">
                        {{ $tarefas->titulo }}
                    </div>
                    @empty
                    <div class="alert alert-success">
                        <p>Nothing to say... </p>
                    </div>
                @endforelse
                    Lista de tarefas
                </div>
            </div>
        </div>
    </div>
</div>
@endsection