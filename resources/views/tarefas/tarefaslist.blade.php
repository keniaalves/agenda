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
                    <li class="list-group-item">
                        <a href="{{ route('tarefas/tarefasShow', $tarefas) }}">{{ $tarefas->titulo}} - {{ $tarefas->data}}</a>
                        <form action="{{ route('tarefas/tarefasDelete', $tarefas->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                        <a href="{{ route('tarefas/tarefasEdit', $tarefas->id) }}">Editar</a>
                    </li>
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