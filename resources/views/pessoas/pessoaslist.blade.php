@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seus Contatos</div>

                <div class="card-body">
                @forelse($pessoas as $pessoas)
                    <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Contato</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pessoas->nome}}</td>
                            <td>{{ $pessoas->telefone}}</td>
                            <td>
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-primary" href="{{ route('pessoas/pessoasShow', $pessoas) }}">Ver</a>
                                <a type="button" class="btn btn-info" href="{{ route('pessoas/pessoasEdit', $pessoas->id) }}">Editar</a>
                                <form action="{{ route('pessoas/pessoasDelete', $pessoas->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                    </div>
                                </form>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <div class="alert alert-danger">
                        <p>Nothing to say... </p>
                    </div>
                @endforelse
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/pessoaslist.js"></script>
@endsection
