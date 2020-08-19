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

    $('[data-toggle="tooltip"]').tooltip();
    var actions = $("table td:last-child").html();
    // Append table with add row form on add new button click
    $(".add-new").click(function () {
        $(this).attr("disabled", "disabled");
        var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control"></td>' +
            '<td>' + actions + '</td>' +
            '</tr>';
        $("table").append(row);
        $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
    // Add row on add button click
    $(document).on("click", ".add", function () {
        var empty = false;
        var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function () {
            if (!$(this).val()) {
                $(this).addClass("error");
                empty = true;
            } else {
                $(this).removeClass("error");
            }
        });
        $(this).parents("tr").find(".error").first().focus();
        if (!empty) {
            input.each(function () {
                $(this).parent("td").html($(this).val());
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function () {
        $(this).parents("tr").find("td:not(:last-child)").each(function () {
            $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
        });
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
    });
    // Delete row on delete button click
    $(document).on("click", ".delete", function () {
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });

});
