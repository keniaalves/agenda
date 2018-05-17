$(document).ready( function (){
    var datecontatos = $('input[name="aniversario"]').daterangepicker({
        singleDatePicker: true,
    });
    var datetarefas = $('input[name="data"]').daterangepicker({
        singleDatePicker: true,
        // timePicker: true,
        // timePicker24Hour: true,
        // seconds: true,
        //format: 'MM-DD-YYYY hh:mm:ss',
    });

    $("#telefone").validate();
});