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
        $id = Session::get('id');
        $tipo = Session::get('tipo');

        $primeiroNome = explode(" ", $nome);

        $dados = array(
            "nomecompleto" => $nome,
            "primeironome" => $primeiroNome[0],
            "logado" => $logado,
            "cpf" => $cpf,
            "id" => $id,
            "tipo" => $tipo
        );

        echo json_encode($dados);
    }
    
    public function listaAgendamentosCliente()
    {
        Session::init();
        $nome = Session::get('nome');
        $logado = Session::get('logado');
        $cpf = Session::get('cpf');
        $idusuario = Session::get('id');
        $tipo = Session::get('tipo');

        $dados = array(
            ':idusuario' => $idusuario,
        );
        $result = $this->db->select("SELECT id,procedimento,horario FROM braulinosdb.agendamento WHERE 
                idusuario = :idusuario", $dados);

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
