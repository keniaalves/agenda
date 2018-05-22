$(document).ready( function (){
    //DateRangePicker de CONTATOS
    var datecontatos = $('input[name="aniversario"]').daterangepicker({
        singleDatePicker: true,
        maxDate: new Date('2000/01/01') 
    });
    //DateRangePicker de TAREFAS
    var datetarefas = $('input[name="data"]').daterangepicker({
        singleDatePicker: true,
        minDate: moment()
    });

    //validando o formulário de contatos
    $('#formPessoa').validate({
        messages: {
            nome: 'Você esqueceu de nos dizer seu nome.', 
            telefone: {
                required: 'Digite seu telefone.',
                minlength: 'Digite um telefone válido.'
            }
        }
    });
    //validando o formulário de tarefas
    $('#formTarefa').validate({
        errorClass: "invalid",
        messages: {
            titulo: 'Você esqueceu de informar o título da tarefa.',
            descricao: {
                minlegth: 'Conte-nos mais sobre sua tarefa.',
                required: 'Diga algo importante sobre essa tarefa.'
            }
        }
    })
});