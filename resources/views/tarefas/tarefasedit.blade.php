@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                    <form method='POST' action="{{ route('tarefas/tarefasUpdate', $tarefas->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}} 

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ $tarefas->titulo }}" required autofocus>

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
                                <input id="descricao" type="text" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" value="{{ $tarefas->descricao }}" required>

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
                                <input id="data" type="date" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" value="{{ $tarefas->data }}"required>

                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-10"></div>

                                <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    +
                                </a>
                            </div>
                        </div>

                        <div class="form-group row" id="dynamicDiv">
                        <label for="pessoa" class="col-md-4 col-form-label text-md-right">{{ __('Pessoa') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="inputeste" name="pessoas_id">
                                    @forelse($pessoas as $pessoas)
                                    <option value='{{$pessoas->id}}'>{{ $pessoas->id}} - {{ $pessoas->nome}}</option>
                                    @empty
                                    <option>Sem pessoas ainda.</option>
                                    @endforelse
                                </select>
                            </div>
                            <a class="btn btn-danger" href="javascript:void(0)" id="remInput">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                -
                            </a>
                        </div>

                        <script>
                            $(function () {
                                var teste = $('#dynamicDiv').html();
                                
                                $(document).on('click', '#addInput', function () {
                                    $(teste).appendTo(dynamicDiv);
                                    return false;
                                });
                                $(document).on('click', '#remInput', function () {
                                    $(this).parents('#dynamicDiv').remove(teste);
                                    return false;
                                });
                            });
                        </script>

                        <div class="form-group row mb-0">
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