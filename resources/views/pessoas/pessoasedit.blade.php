@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                    <form method='POST' action="{{ route('pessoas/pessoasUpdate', $pessoas->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}} 

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $pessoas->nome }}" required autofocus>

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
                                <input id="aniversario" type="date" class="form-control{{ $errors->has('aniversario') ? ' is-invalid' : '' }}" name="aniversario" value="{{ $pessoas->aniversario }}" required>

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
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ $pessoas->telefone }}"required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Tarefas') }}</label>
                            <div class="col-md-6 boxes">
                            @forelse($tarefas as $tarefas)
                                <label class="checkbox">  
                                    <input type="checkbox" name="tarefas_id" value='{{$tarefas->id}}'>
                                        {{ $tarefas->id}} - {{ $tarefas->descricao}}
                                    </label></br>
                                    @empty
                                    <p>Sem tarefas</p>
                            @endforelse
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar') }}
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