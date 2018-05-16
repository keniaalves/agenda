@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nova tarefa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tarefas/tarefasStore') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ old('titulo') }}" required autofocus>

                                @if ($errors->has('titulo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" value="{{ old('descricao') }}" required>

                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                            <div class="col-md-6">
                                <input id="data" type="text" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" required>

                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    
                        <div class="row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Contatos') }}</label>
                            <div class="col-md-6 boxes">
                            @forelse($pessoas as $pessoas)
                                <label class="checkbox">  
                                    <input type="checkbox" name="pessoas_id[]" value='{{$pessoas->id}}'>
                                        {{ $pessoas->id}} - {{ $pessoas->nome}}
                                </label></br> 
                                @empty
                                    <p>Sem contatos</p>
                            @endforelse
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Criar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript" src="/vendor/daterangepicker/moment.js"></script>
<script type="text/javascript" src="/vendor/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/js/create.js"></script>

@endsection