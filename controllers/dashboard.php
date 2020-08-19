<?php

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('dashboard/js/dashboard.js');
    }

    function index()
    {
        Session::init();
        if (Session::get("nome" ) != "") {
            $this->view->title = 'Dashboard';
            //$this->view->render('header');
            $this->view->render('dashboard/index');
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
}
