@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seus Contatos</div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Contato</th>
                                <th>Telefone</th>
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
<script type="text/javascript" src="/js/pessoaslist.js"></script>

<script type="text/javascript">
    const routeListaPessoas = "{{ route('pessoas/getData') }}";
    const routeShowPessoas = "{{ route('pessoas/pessoasShow', '/') }}";
    const routeEditaPessoas = "{{ route('pessoas/pessoasEdit', '/') }}";
    const routeDeletaPessoas = "{{ route('pessoas/pessoasDelete', '/') }}";
</script>
@endsection
