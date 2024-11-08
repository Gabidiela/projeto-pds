$(document).ready(function () {
    $('.cpf').mask('000.000.000-00');
    $('.telefone').mask('(00) 00000-0000');
    $('.cep').mask('00000-000');
    $('.cpf').on('input', function () {
        var cpf = $(this).val();
        if (cpf.length === 14) {
            if (validarCPF(cpf)) {
                $(this).removeClass('invalid');
                $('.message-cpf').text('CPF válido!');
                $('.cpf').css('color', 'green');
            } else {
                $(this).addClass('invalid');
                $('.cpf').css('color', 'red');
            }
        } else {
            $(this).removeClass('invalid');
            $('.cpf').css('color', 'white');
        }
    });

});

function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
        return false;
    }
    var soma = 0;
    var resto;
    for (var i = 1; i <= 9; i++) {
        soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.substring(9, 10))) {
        return false;
    }
    soma = 0;
    for (var i = 1; i <= 10; i++) {
        soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.substring(10, 11))) {
        return false;
    }
    return true;
}
