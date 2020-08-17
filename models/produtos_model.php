<?php

class Produtos_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function lista() 
    {  
        $result=$this->db->select('select codigo,descricao,valor from produto order by descricao');
		
		//print_r($result);
		
		$result = json_encode($result);
		
		
		echo $result;
    }


    public function addCarrinho(){
        /*estrutura do carrinho de compras:
            $carrinho[$cod_produto]=$qtd
            vetor carrinho na posicao codigo do produto armazena a qtd
        */
        $prod=$_POST["codproduto"];
        Session::init();
        //carrega a variavel de sessao carrinho para a variavel
        $carrinho=Session::get('carrinho');
        //se o produto ja existe no vetor entao incremento a qtd
        if(array_key_exists($prod,$carrinho)){
            $carrinho[$prod]++;
        }
        else{
            //caso nao exista no carrinho coloco qtd 1
            $carrinho[$prod]=1;
        }

        //atualiza o vetor da sessao com o carrinho 
        Session::set('carrinho',$carrinho);

    }

    public function rmCarrinho(){
        /*estrutura do carrinho de compras:
            $carrinho[$cod_produto]=$qtd
            vetor carrinho na posicao codigo do produto armazena a qtd
        */
        $prod=$_POST["codproduto"];
        Session::init();
        //carrega a variavel de sessao carrinho para a variavel
        $carrinho=Session::get('carrinho');
        //verificar se o produto existe no vetor
        if(array_key_exists($prod,$carrinho)){
            $carrinho[$prod]--;
            if($carrinho[$prod]<=0){
                 //se for o ultimo remove do array
                unset($carrinho[$prod]);
            }
        }

      
        
        //atualiza o vetor da sessao com o carrinho 
        Session::set('carrinho',$carrinho);

    }

    public function listaCarrinho() 
    {  
        Session::init();
        //carrega a variavel de sessao carrinho para a variavel
        $carrinho=Session::get('carrinho');
        //print_r($carrinho);
        //se tiver produtos no carrinho
        if(count($carrinho)>0){
                //select para retornar os dados do produto
                $sql="select descricao,valor from produto where codigo=:par_cod";
                //vetor que ira armazenar o resultado
                $vetRes=array();
                $i=0;
                //percorre o vetor do carrinho
                foreach($carrinho as $pro=>$qtd){
                        //pega a descricao e valor unitario do produto 
                        $param=array(":par_cod"=>$pro);
                        $infopro=$this->db->select($sql,$param);
                        $vetRes[$i]["codigo"]=$pro;
                        $vetRes[$i]["descricao"]=$infopro[0]->descricao;
                        $vetRes[$i]["valorun"]=$infopro[0]->valor;
                        $vetRes[$i]["qtd"]=$qtd;
                        $vetRes[$i]["valortotal"]=$infopro[0]->valor*$qtd;
                        $i++;
                }
                
                $result = json_encode($vetRes);
                
                
                echo $result;
            }
    }

	
}