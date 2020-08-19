<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin()
    {
        $email = strtoupper($_POST['email']);
        $senha = strtoupper(hash('sha256', $_POST['senha']));

        $dados = array(
            ':email' => $email,
            ':senha' => $senha
        );
        $result = $this->db->select("SELECT id,nomecompleto,cpf FROM braulinosdb.usuario WHERE 
                email = :email AND senha = :senha", $dados);

        $count = count($result);

        if ($count > 0) {
            // login
            Session::init();
            Session::set('nome', $result[0]->nomecompleto);
            Session::set('logado', true);
            Session::set('cpf', $result[0]->cpf);
            Session::set('id', $result[0]->id);
            Session::set('tipo', 0);
            echo ("OK");
        } else {
            echo ("Dados Incorretos.");
        }
    }

    public function cadastrarCliente()
    {
        $cpf = preg_replace("/[^0-9]/", "", $_POST['cpf']);
        $celular = preg_replace("/[^0-9]/", "", $_POST['celular']);
        $nomecompleto = strtoupper($_POST['nomecompleto']);
        $email = strtoupper($_POST['email']);
        $senha = strtoupper(hash('sha256', $_POST['senha']));

        $dados = array(
            ':email' => $email,
            ':senha' => $senha
        );
        $result = $this->db->select("SELECT nomecompleto,cpf FROM braulinosdb.usuario WHERE 
                email = :email AND senha = :senha", $dados);

        $count = count($result);

        if ($count > 0) {
            echo ("Usuário ja existe, faça o login.");
        } else {
            $this->db->insert('braulinosdb.usuario', array(
                'cpf' => $cpf,
                'celular' => $celular,
                'nomecompleto' => $nomecompleto,
                'email' => $email,
                'senha' => $senha,
                'tipo' => 0
            ));

            $dados = array(
                ':email' => $email,
                ':senha' => $senha
            );
            $result = $this->db->select("SELECT id FROM braulinosdb.usuario WHERE 
                    email = :email AND senha = :senha", $dados);

            Session::init();
            Session::set('nome', $nomecompleto);
            Session::set('logado', true);
            Session::set('cpf', $cpf);
            Session::set('id', $result[0]->id);
            Session::set('tipo', 0);
            echo ("OK");
        }
    }
}
