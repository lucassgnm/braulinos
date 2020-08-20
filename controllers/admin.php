<?php

class Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('admin/js/admin.js');
    }

    function index()
    {
        Session::init();
        if (Session::get("tipo" ) == 1) {
            $this->view->title = 'Admin';
            //$this->view->render('header');
            $this->view->render('admin/index');
            //$this->view->render('footer');
        } else {
            $this->view->render('error/index');
        }
    }

    function sessaoUsuario()
    {
        $this->model->sessaoUsuario();
    }

    function dashLogout()
    {
        $this->model->dashLogout();
    }
    
    function listaAgendamentosCliente()
    {
        $this->model->listaAgendamentosCliente();
    }
    
    function listaUltimaSemana()
    {
        $this->model->listaUltimaSemana();
    }
    
    function listaAgendamentosFiltro($filtro)
    {
        $this->model->listaAgendamentosFiltro($filtro);
    }

    function getProcedimento()
    {
        $this->model->getProcedimento();
    }

    function addAgendamento()
    {
        $this->model->addAgendamento();
    }

    function updAgendamento($id)
    {
        $this->model->updAgendamento($id);
    }
    
    function delAgendamento($id)
    {
        $this->model->delAgendamento($id);
    }
    
    function getHorario()
    {
        $this->model->getHorario();
    }
}
