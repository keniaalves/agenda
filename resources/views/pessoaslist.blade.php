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
                        <a href="{{ route('pessoasShow', $pessoas) }}">{{ $pessoas->nome}} - {{ $pessoas->telefone}}</a>
                        <form action="{{ route('pessoasDelete', $pessoas->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                        <a href="{{ route('pessoasEdit', $pessoas->id) }}">Editar</a>
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