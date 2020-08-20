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
        Session::init();
        $nome = Session::get('nome');
        $logado = Session::get('logado');
        $cpf = Session::get('cpf');
        $idusuario = Session::get('idusuario');
        $tipo = Session::get('tipo');

        $dados = array(
            ':idusuario' => $idusuario,
        );
        $result = $this->db->select("SELECT a.id, p.nome, a.horario, a.data FROM braulinosdb.agendamento a
                                        JOIN braulinosdb.procedimento p ON a.procedimento = p.id
                                        WHERE idusuario = :idusuario
                                        ORDER BY a.data desc", $dados);

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

        $dados = array(
            ':horario' => $horario,
            ':data' => $dataprocedimento
        );

        $result = $this->db->select("SELECT id FROM braulinosdb.agendamento WHERE 
                horario = :horario AND data = :data", $dados);

        $count = count($result);

        if ($count > 0) {
            $dados = array(
                "code" => 0,
                "msg" => "Esse horario já está agendado, por favor tente outro!"
            );
        } else {
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
        }
        echo json_encode($dados);
    }

    public function delAgendamento($id)
    {
        $dados = array(
            ':id' => $id,
        );
        $result = $this->db->select("SELECT data FROM braulinosdb.agendamento
                                        WHERE id = :id", $dados);
        $somentedata = $result[0]->data;

        $data_inicial = new DateTime($somentedata);
        $data_final = new DateTime('now');
        $diferenca = $data_inicial->diff($data_final);
        $diferenca = $diferenca->format('%d');

        if ($diferenca <= 2) {
            $dados = array(
                "code" => 0,
                "msg" => "O agendamento não pode ser cancelado pois faltam apenas " . $diferenca . " dias para a data escolhida. Ligue para a braulinos para efetuar o cancelamento"
            );
        } else {
            $id = (int)$id;
            $this->db->delete('braulinosdb.agendamento', 'id =' . $id);
            $dados = array(
                "code" => 1,
                "msg" => "Agendamento cancelado com sucesso!"
            );
        }
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

        $dados = array(
            ':id' => $id,
        );
        $result = $this->db->select("SELECT data FROM braulinosdb.agendamento
                                        WHERE id = :id", $dados);
        $somentedata = $result[0]->data;

        $data_inicial = new DateTime($somentedata);
        $data_final = new DateTime('now');
        $diferenca = $data_inicial->diff($data_final);
        $diferenca = $diferenca->format('%d');

        if ($diferenca <= 2) {
            $dados = array(
                "code" => 0,
                "msg" => "O agendamento não pode ser editado pois faltam apenas " . $diferenca . " dias para a data escolhida. Ligue para a braulinos para editar."
            );
        } else {
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
        }
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
