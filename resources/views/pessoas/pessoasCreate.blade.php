@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pessoas/pessoasStore') }}" id="formPessoa">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aniversario" class="col-md-4 col-form-label text-md-right">{{ __('Nascimento') }}</label>

                            <div class="col-md-6">
                                <input id="aniversario" type="text" class="form-control{{ $errors->has('aniversario') ? ' is-invalid' : '' }}" name="aniversario" value="{{ old('aniversario') }}" required>

                                @if ($errors->has('aniversario'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('aniversario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" minlength="4" name="telefone" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" minlength="4" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                        <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Tarefas') }}</label>
                            <div class="col-md-6 boxes">
                            @forelse($tarefas as $tarefas)
                                <label class="checkbox">  
                                    <input type="checkbox" name="tarefas_id[]" value='{{$tarefas->id}}'>
                                        {{ $tarefas->id}} - {{ $tarefas->titulo}}
                                </label> </br> 
                                @empty
                                <p>Sem tarefas</p>
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
<script src="/vendor/validatejs/validate.js"></script>
<script type="text/javascript" src="/js/create.js"></script>

@endsection