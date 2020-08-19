$(document).ready(function () {
    toastr.options.positionClass = 'toast-top-full-width';

    $.post("sessaoUsuario/", function (data) {
        dados = JSON.parse(data);

        if (dados['cpf'] != "") {
            toastr.success("Você foi logado com sucesso!")
            $("#h4name").html('Bem-vindo (a) ' + dados['primeironome']);
        } else {
            toastr.warning(data);
        }
    });

    var down = false;

    $('#bell').click(function (e) {

        var color = $(this).text();
        if (down) {

            $('#box').css('height', '0px');
            $('#box').css('opacity', '0');
            down = false;
        } else {

            $('#box').css('height', 'auto');
            $('#box').css('opacity', '1');
            down = true;
        }
    });

    $("#mostraMenu").hide();

    $("#escondeMenu").click(function (e) {
        e.preventDefault();
        $(".sidebar").fadeOut(500);
        $("#escondeMenu").hide();
        $("#mostraMenu").show();
    });

    $("#mostraMenu").click(function (e) {
        e.preventDefault();
        $(".sidebar").fadeIn(500);
        $("#escondeMenu").show();
        $("#mostraMenu").hide();
    });

    $("#dashLogout").click(function (e) {
        e.preventDefault();
        $.post("dashLogout/", function (data) {
            if (data == "OK") {
                window.location = '../login/';
            } else {

            }
        });
    });

    // TABLE FUNCTIONS -----------------------------------------

});
