<?php

class Produtos extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('produtos/js/produtos.js');
    }
    
    function index() {
        $this->view->title = 'Lista de Produtos';
		$this->view->render('header');
        $this->view->render('produtos/index');
		$this->view->render('footer');
    }


    function lista(){
        $this->model->lista();

    }

    function listaCarrinho(){
        $this->model->listaCarrinho();

    }
    
    function addCarrinho(){
        $this->model->addCarrinho();

    }

    function rmCarrinho(){
        $this->model->rmCarrinho();

    }
  
}