<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ver()
    {
		$dados=array(':cpf' => $_POST['txtcpf'],':senha' => $_POST['txtsenha']);
        $result = $this->db->select("SELECT cpf,nome FROM dbclientes.cliente WHERE 
                cpf = :cpf AND senha = sha2(:senha,256)",$dados);
                
        $count = count($result);

        if ($count > 0) {
            // login
            Session::init();
            Session::set('nome', $result[0]->nome);
            Session::set('logado', true);
            Session::set('cpf', $result[0]->cpf);
            echo("OK");
        } else {
            echo("Dados Incorretos.");
        }
        
    }
    
}