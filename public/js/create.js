$(document).ready( function (){
    //DateRangePicker de CONTATOS
    var datecontatos = $('input[name="aniversario"]').daterangepicker({
        singleDatePicker: true,
        maxDate: new Date('2000/01/01') 
    });
    //DateRangePicker de TAREFAS
    var datetarefas = $('input[name="data"]').daterangepicker({
        singleDatePicker: true,
    });

    //validando o formulário de contatos
    $("#formPessoa").validate({
        messages: {
            nome: "Você esqueceu de nos dizer seu nome.", 
            telefone: {
                required: "Digite seu telefone.",
                minlength: "Digite um telefone válido."
            }
        }
    });
});