@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pessoas/pessoasStore') }}">
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
                                <input id="aniversario" type="date" class="form-control{{ $errors->has('aniversario') ? ' is-invalid' : '' }}" name="aniversario" value="{{ old('aniversario') }}" required>

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
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="tarefa" class="col-md-4 col-form-label text-md-right">{{ __('Tarefa') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="Selecione">
                                    @forelse($tarefas as $tarefas)
                                    <option>{{ $tarefas->id}} - {{ $tarefas->descricao}}</option>
                                    @empty
                                    <option>Sem tarefas ainda.</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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