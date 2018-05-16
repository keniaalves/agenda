@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Suas Tarefas</div>
                
                <div class="card-body">
                    <label>Período</label>
                    <input type="number" name="periodo" class="form-control">
                    <label>Quantidade de pessoas</label>
                    <input type="number" name="quantidadepessoas" class="form-control">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Acao</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/vendor/sweetalert2/sweetalert2.all.js"></script>
<script type="text/javascript" src="/js/tarefaslist.js"></script>

<script type="text/javascript">
    const routeListaTarefas = "{{ route('tarefas/getData') }}";
    const routeShowTarefas = "{{ route('tarefas/tarefasShow', '/') }}";
    const routeEditaTarefas = "{{ route('tarefas/tarefasEdit', '/') }}";
    const routeDeletaTarefas = "{{ route('tarefas/tarefasDelete', '/') }}";
</script>
@endsection