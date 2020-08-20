<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap">
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= URL; ?>/public/bs/css/bootstrap.min.css">


    <title><?= $this->title; ?></title>

</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: arial
        }

        body {
            background: #f3f5f9
        }

        .wrapper {
            position: relative
        }

        .sidebar {
            position: fixed;
            width: 300px;
            height: 100%;
            background: #000000e0;
            padding: 20px 0
        }

        .text-muted {
            color: #adb5bd !important
        }

        ul {
            padding-bottom: 20px
        }

        ul li a img {
            background: #66BB6A;
            top: 0;
            border: none;
            width: 20px
        }

        .sidebar ul li {
            padding: 15px
        }

        .sidebar ul li a {
            color: #fff;
            display: block
        }

        .sidebar ul li a .fas {
            width: 30px;
            color: #bdb8d7 !important
        }

        i.fas.fa-home:hover,
        i.fas.fa-file-invoice:hover,
        i.fas.fa-video:hover,
        i.fas.fa-id-badge:hover,
        i.fas.fa-external-link-alt:hover,
        i.fas.fa-code:hover,
        i.far.fa-calendar-alt:hover,
        i.far.fa-credit-card:hover {
            color: #304FFE !important
        }

        .sidebar ul li a .far {
            width: 30px;
            color: #bdb8d7 !important
        }

        .sidebar ul li:hover {
            background: #000
        }

        .sidebar ul li a:hover {
            text-decoration: none
        }

        /* //////////////// NAVBAR ///////////////////// */

        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

        * {
            padding: 0px;
            margin: 0px
        }

        body {
            background: #8E24AA;
            color: #fff;
            font-family: 'Manrope', sans-serif
        }

        nav {
            display: flex;
            align-items: center;
            background: #AB47BC;
            height: 60px;
            position: relative;
            border-bottom: 1px solid #495057
        }

        .icon {
            cursor: pointer;
            margin-right: 50px;
            line-height: 60px
        }

        .icon span {
            background: #f00;
            padding: 7px;
            border-radius: 50%;
            color: #fff;
            vertical-align: top;
            margin-left: -25px
        }

        .icon img {
            display: inline-block;
            width: 26px;
            margin-top: 4px
        }

        .icon:hover {
            opacity: .7
        }

        .logo {
            flex: 1;
            margin-left: 50px;
            color: #eee;
            font-size: 40px;
            font-family: 'Dancing Script', cursive
        }

        .notifications {
            width: 300px;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 63px;
            right: 62px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .notifications h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }

        .notifications h2 span {
            color: #f00
        }

        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px
        }

        /* ---------------- TABELA ------------------ */
        .custab {
            border: 1px solid black;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px black;
            transition: 0.5s;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .custab:hover {
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }

        .custyle {
            margin-left: 330px;
        }

        .pull-right {
            margin-top: 20px;
        }

        /* modal */
        .modal-content.head {
            border: 1px solid black;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px black;
            transition: 0.5s;
            background-color: rgba(142, 36, 170, 0.9);
        }

        /* confirm modal */
    </style>

    <section>
        <nav>
            <div class="logo">Braulino's</div>
            <button type="button" class="toggleMenu btn btn-warning" id="escondeMenu" style="margin-right: 40px;">Esconder menu</button>
            <button type="button" class="toggleMenu btn btn-warning" id="mostraMenu" style="margin-right: 40px;">Mostrar menu</button>
            <div class="icon" id="bell">
                <img src="<?= URL ?>public/images/notficon.png" alt="">
            </div>
            <div class="notifications" id="box">
                <h2>Notificações <span>(2)</span></h2>
                <div class="notifications-item"> <img src="<?= URL ?>public/images/notf1.jpg" alt="img">
                    <div class="text">
                        <h4 id="h4name"></h4>
                        <p>Agora você pode agendar seu horário no Braulino's <span>ONLINE</span>!</p>
                    </div>
                </div>
            </div>
        </nav>
    </section>


    <section>
        <div class="wrapper d-flex" id="sidebar">
            <div class="sidebar"> <small class="text-muted pl-3">GERAL</small>
                <ul>
                    <li>
                        <a href="<?= URL ?>dashboard/"><i class="fas fa-home"></i>Dashboard</a>
                    </li>
                </ul>
                <small class="text-muted px-3">CONTA</small>
                <ul>
                    <li>
                        <a href="" id="dashLogout"><i class="fas fa-sign-out-alt"></i>Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Teste Tabela -->
    <section>
        <div class="row col-md-9 custyle">
            <table class="table custab" id="custab">
                <thead>
                    <button id="btnNew" class="btn btn-primary pull-right" style="margin-bottom: 10px;"><b>+</b> Fazer novo agendamento</button>
                    <tr>
                        <th>ID</th>
                        <th>Procedimento</th>
                        <th>Horário</th>
                        <th class="text-center">Opcões</th>
                    </tr>
                </thead>
                <tbody id="linhas">

                </tbody>
            </table>
        </div>
    </section>
    <!-- Fim teste Tabela -->

    <!-- Modal inicio -->
    <section>
        <div class="modal modaledit" id="modaledit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content head">
                    <div class="modal-header">
                        <h5 class="modal-title"> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Procedimento:</p>
                        <select class="form-control" id="selProcedimento">
                            <!-- selProcedimento -->
                        </select>
                        <p style="margin-top: 20px;">Dia:</p>
                        <input id="dataInput" style="color: black; padding-left: 10px;" type="date">
                        <p style="margin-top: 20px;">Horário:</p>
                        <select class="form-control" id="selHorario">
                            <!-- selHorario -->
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnSalvaEdit">Salvar edições</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnAdiciona">Adicionar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal fim -->

    <!-- Modal confirm -->
    <div class="modal modalconfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content head">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;">Tem certeza que deseja cancelar o agendamento n: <label id="labelIdDelete"></label> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btnOkCancelaAgendamento">Cancelar agendamento</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar janela</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal confirm -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
    <script src="<?= URL; ?>/public/bs/js/jquery.mask.js"></script>
    <script src="<?= URL; ?>/public/bs/js/bootstrap.min.js"></script>
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>
</body>

</html>