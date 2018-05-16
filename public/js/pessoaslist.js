$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content'),
        }
    });

        var datatable = $('#table1').DataTable({
        serverSide: true,
        ajax: {
            method: "GET",
            url: routeListaPessoas,
            dataSrc: function(result) {
				var data = result.data;
                for (var row in data) {
                    data[row].botoes = "<div class='btn-group' role='group' aria-label='Basic example'>\
                                <a class='btn btn-primary' href='" + routeShowPessoas + '/' + data[row].id + "'>Ver</a>\
                                <a class='btn btn-info' href='" + routeEditaPessoas + '/' + data[row].id + "'>Editar</a>\
                                <button id='delete' class='btn btn-danger' data-delete='" + data[row].id + "'>Deletar</button>\
                                    </div>";
                }
                return data;
            }
        }, 
        columns: [
            {data: 'nome'},
            {data: 'telefone'},
            {data: 'botoes', name: null, searchable: false, orderable: false }
        ]
    });

    $('#table1').on('click', '#delete', function() {
        var id = $(this).attr('data-delete');
        swal({
            title: 'Certeza?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim!',
            cancelButtonText: 'Não!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: "POST",
                    url: routeDeletaPessoas + '/'+ id,
                    
                    data: {
                        '_method': "DELETE"
                    },
                    success: function (resp) {
                        datatable.draw();
                        swal(resp.message)
                        // alert(resp.message);
        
                    },
                    error: function(resp) {
                        swal(resp.message);
                    }
                });
            }
          })
    });
} );