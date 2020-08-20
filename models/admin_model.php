<?php

class Admin_Model extends Model
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
        $idusuario = Session::get('idusuario');
        $tipo = Session::get('tipo');

        $primeiroNome = explode(" ", $nome);

        $dados = array(
            "nomecompleto" => $nome,
            "primeironome" => $primeiroNome[0],
            "logado" => $logado,
            "cpf" => $cpf,
            "idusuario" => $idusuario,
            "tipo" => $tipo
        );

        echo json_encode($dados);
    }

    public function listaAgendamentosCliente()
    {
        $datahora = date_create()->format('Y-m-d') . " 00:00:00.0";
        $dados = array(
            ":datahora" => $datahora
        );
        $result = $this->db->select("SELECT c.id, c.nomecompleto, c.nome, c.status, c.datahora, c.`data`, c.horario
        from (select b.id, b.nomecompleto, b.nome, b.status, b.`data`, b.horario, convert(b.datahora, datetime) datahora 
            from (select a.id, u.nomecompleto, p.nome, a.status, a.`data`, a.horario, concat(a.`data`,' 00:00:00') as datahora 
                from braulinosdb.agendamento a
                join braulinosdb.procedimento p ON a.procedimento = p.id
                join braulinosdb.usuario u ON a.idusuario = u.id) b) c
                where c.datahora >= :datahora
                order by c.datahora asc", $dados);

        echo json_encode($result);
    }

    public function listaUltimaSemana()
    {
        $result = $this->db->select("select *
        from (select b.id, b.nomecompleto, b.nome, b.status, b.horario, b.data, convert(b.datahora, datetime) datahora 
              from (select a.id, u.nomecompleto, p.nome, a.status, a.horario, a.data, concat(a.`data`,' 00:00:00') as datahora 
                    from braulinosdb.agendamento a
                    join braulinosdb.procedimento p ON a.procedimento = p.id
                    join braulinosdb.usuario u ON a.idusuario = u.id) b) c
                    where c.datahora between date_sub(now(),INTERVAL 1 WEEK) and now()");

        echo json_encode($result);
    }

    public function listaUltimaSemanaGrafico()
    {
        $result = $this->db->select("select c.data, count(c.id) qtd
        from (select b.id, b.nomecompleto, b.nome, b.data, b.status, convert(b.datahora, datetime) datahora 
              from (select a.id, u.nomecompleto, p.nome, a.data, a.status, concat(a.`data`,' 00:00:00') as datahora 
                    from braulinosdb.agendamento a
                    join braulinosdb.procedimento p ON a.procedimento = p.id
                    join braulinosdb.usuario u ON a.idusuario = u.id) b) c
                    where c.datahora between date_sub(now(),INTERVAL 1 WEEK) and now()
                   group by c.datahora;");

        echo json_encode($result);
    }

    public function listaAgendamentosFiltro($filtro)
    {
        $datahora = date_create()->format('Y-m-d') . " 00:00:00.0";
        $dados = array(
            ":datahora" => $datahora,
            ":filtro" => $filtro . "%"
        );
        $result = $this->db->select("SELECT c.id, c.nomecompleto, c.nome, c.status, c.datahora, c.`data`, c.horario 
        from (select b.id, b.nomecompleto, b.nome, b.status, b.`data`, b.horario, convert(b.datahora, datetime) datahora 
            from (select a.id, u.nomecompleto, p.nome, a.status, a.`data`, a.horario, concat(a.`data`,' 00:00:00') as datahora 
                from braulinosdb.agendamento a
                join braulinosdb.procedimento p ON a.procedimento = p.id
                join braulinosdb.usuario u ON a.idusuario = u.id) b) c
                where c.datahora >= :datahora and
                      c.nomecompleto LIKE :filtro
                order by c.datahora asc", $dados);

        echo json_encode($result);
    }

    public function getProcedimento()
    {
        $result = $this->db->select("SELECT id,nome FROM braulinosdb.procedimento ORDER BY nome");

        echo json_encode($result);
    }

    public function getHorario()
    {
        $result = $this->db->select("SELECT id,horario FROM braulinosdb.horario ORDER BY id");

        echo json_encode($result);
    }

    public function addAgendamento()
    {
        $procedimento = (int)$_POST["procedimento"];
        $horario = $_POST["horario"];
        $dataprocedimento = $_POST["dataprocedimento"];
        Session::init();
        $idusuario = Session::get('idusuario');

        $this->db->insert('braulinosdb.agendamento', array(
            'procedimento' => $procedimento,
            'horario' => $horario,
            'idusuario' => $idusuario,
            'data' => $dataprocedimento,
            'status' => 1
        ));
        $dados = array(
            "code" => 1,
            "msg" => "Agendamento realizado com sucesso!"
        );
        echo json_encode($dados);
    }

    public function delAgendamento($id)
    {
        $id = (int)$id;
        $this->db->delete('braulinosdb.agendamento', 'id =' . $id);
        $dados = array(
            "code" => 1,
            "msg" => "Agendamento cancelado com sucesso!"
        );
        echo json_encode($dados);
    }

    /** * Atualizar dados do agendamento
     * * @access public 
     * * @param int $id
     * * @return json 
     * */
    public function updAgendamento($id)
    {
        $procedimento = (int)$_POST["procedimento"];
        $horario = $_POST["horario"];
        $dataprocedimento = $_POST["dataprocedimento"];

        $id = (int)$id;
        $dados = array(
            "procedimento" => $procedimento,
            "horario" => $horario,
            'data' => $dataprocedimento,
        );
        $this->db->update('braulinosdb.agendamento', $dados, 'id =' . $id);
        $dados = array(
            "code" => 1,
            "msg" => "Agendamento editado com sucesso!"
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
