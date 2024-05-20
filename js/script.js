$(function () {


    //HEADER
    $(window).scroll(function () {
          if($(this).scrollTop() > 200)
          {
              if (!$('.main_header').hasClass('fixed'))
              {
                  $('.main_header').stop().addClass('fixed').css('top', '-100px').animate(
                      {
                          'top': '0px'
                      }, 500);
              }
          }
          else
          {
              $('.main_header').removeClass('fixed');
          }
    });


});
function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
    if (cpf.length === 11 && !isCPFValido(cpf)) {
        document.getElementById('saida').textContent = 'CPF Inválido';
        return false;
    } else {
        document.getElementById('saida').textContent = '';
        return true;
    }
}

function isCPFValido(cpf) {
    let soma = 0;
    let resto;
    if (cpf === '00000000000') return false;

    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11;

    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11;

    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) return false;

    return true;
}

document.getElementById('cpf').addEventListener('blur', function() {
    validarCPF(this.value);
});
function formatarTelefone(input) {
    // Remove caracteres não numéricos
    let numero = input.value.replace(/\D/g, '');

    // Formata o número de telefone
    if (numero.length > 0) {
        let formatoTelefone = '(' + numero.substring(0, 2) + ') ' + numero.substring(2, 6) + '-' + numero.substring(6, 10);
        input.value = formatoTelefone;
    } else {
        input.value = '';
    }
}
function toggleRequired(checkboxId, textFieldId) {
    var checkbox = document.getElementById(checkboxId);
    var textField = document.getElementById(textFieldId);

    if (checkbox.checked) {
        textField.removeAttribute('required');
    } else {
        textField.setAttribute('required', 'required');
    }

    if (!checkbox.checked && textField.value.trim() === '') {
        textField.setAttribute('required', 'required');
    }
}

