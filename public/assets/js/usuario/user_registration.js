$(document).ready(function () {

    // Máscaras
    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("+55 (00) 00000-0000");
    $("#cep").mask("00000-000"); 

    
    $("form").submit(function () {
        $("#cpf").val($("#cpf").cleanVal());
        $("#cep").val($("#cep").cleanVal());

        let telefone = $("#telefone").cleanVal();
        if (telefone.startsWith("55")) {
            telefone = "+" + telefone;
        } else {
            telefone = "+55" + telefone;
        }
        $("#telefone").val(telefone);
    });

});
