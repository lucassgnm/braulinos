<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sessaoUsuario()
    {
        Session::init();
        $nome = Session::get('nome');
        $logado = Session::get('logado');
        $cpf = Session::get('cpf');
        $tipo = Session::get('tipo');

        $primeiroNome = explode(" ", $nome);

        $dados = array(
            "nomecompleto" => $nome,
            "primeironome" => $primeiroNome[0],
            "logado" => $logado,
            "cpf" => $cpf,
            "tipo" => $tipo
        );

        echo json_encode($dados);
    }

    public function dashLogout()
    {
        // logout
        Session::init();
        Session::destroy();
        echo ("OK");
    }
}
