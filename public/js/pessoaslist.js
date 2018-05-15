$(document).ready(function(){
    var datatable  = $('#table1').DataTable({
        processing: true,
        serverSide: true,
        searching : false,
        ordering  : true,
        ajax      : {
            type   : "GET",
            url    : "",
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            },
        },
        "columns" : [
            { "data"          : "nome" },
            { "data"          : "aniversario" }
        ]
    });
});