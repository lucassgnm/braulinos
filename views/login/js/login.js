$(document).ready(function () {
    toastr.options.positionClass = 'toast-top-full-width';
    $("#cadastrar").hide();
    $("#cadCpf").mask('000.000.000-00');

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);

    $("#btnLogar").click(function (e) {
        e.preventDefault();
        email = $("#loginEmail").val();
        senha = $("#loginSenha").val();

        if (!validateEmail(email)) {
            toastr.warning("Esse email não é válido, por favor digite novamente.");
        }
        else if (senha.length < 5) {
            toastr.warning("A senha é muito curta, por favor digite novamente.");
        } else {
            $.post("checkLogin/", $("#frmLogar").serialize(), function (data) {
                if (data == "OK") {
                    window.location = '../dashboard/';
                } else {
                    toastr.warning(data);
                }
            });
        };
    });

    $("#btnRedCadastro").click(function (e) {
        e.preventDefault();
        $("#logar").fadeOut(1000);
        $("#logar").hide();
        $("#cadastrar").fadeTo(2000, 1);
    });

    $("#btnCadastrar").click(function (e) {
        e.preventDefault();
        cpf = $("#cadCpf").val().replace(/([^\d])+/gim, '');
        celular = $("#cadCelular").val().replace(/([^\d])+/gim, '');
        nomecompleto = $("#cadNome").val();
        email = $("#cadEmail").val();
        senha = $("#cadSenha").val();
        c_senha = $("#cadConfSenha").val();

        if (!validateEmail(email)) {
            toastr.warning("Esse email não é válido, por favor digite novamente.");
        }
        else if (cpf.length < 11) {
            toastr.warning("Esse CPF não é valido, por favor digite novamente.");
        }
        else if (celular.length < 10) {
            toastr.warning("Esse número de celular não é valido, por favor digite novamente.");
        }
        else if (senha != c_senha) {
            toastr.warning("As senhas não conferem, por favor digite novamente.");
        }
        else if (nomecompleto == "") {
            toastr.warning("Por favor digite o nome completo.");
        }
        else if (senha.length < 5 || c_senha.length < 5) {
            toastr.warning("A senha é muito curta, por favor digite novamente.");
        } else {
            $.post("cadastrarCliente/", $("#frmCadastrar").serialize(), function (data) {
                if (data == "OK") {
                    window.location = '../dashboard/';
                } else {
                    toastr.warning(data);
                }
            });
        };
    });
});

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function somenteNumeros(num) {
    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
      campo.value = "";
    }
}

