@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seus Contatos</div>

                <div class="card-body">
                @forelse($pessoas as $pessoas)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">

                            <div class="col-md-8">
                                {{ $pessoas->nome}} - {{ $pessoas->telefone}}
                            </div>

                            <div class="col-md-4">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary" href="{{ route('pessoas/pessoasShow', $pessoas) }}">Ver</a>
                                <a class="btn btn-info" href="{{ route('pessoas/pessoasEdit', $pessoas->id) }}">Editar</a>
                                <form action="{{ route('pessoas/pessoasDelete', $pessoas->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger">Deletar</button>
                                </form>
                            </div>
                            </div>
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