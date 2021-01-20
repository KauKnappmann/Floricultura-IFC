<?php

require_once('ProdutoCarrinho.php');

class Pedido extends ProdutoCarrinho{
       //Atributos variaveis
        private $pedido;
        private $numeroPedido;
        private $frete;
 
    //Métodos
    public function __construct($pedido, $nomeProduto, $valorProduto, $quantidadeProduto, TipoProduto $tp, $frete){
        $this->pedido = $pedido;
        $this->frete = $frete;
        parent::__construct($nomeProduto, $valorProduto, $quantidadeProduto, $tp, $pedido);
    }

    public function imprimir(){
        $texto = parent::imprimir();
        $texto .= "<br>Valor total: ".$this->getvalorTotal();

        return $texto;
    }

    public function getvalorTotal(){

        $valorcalculado = parent::getvalorTotal() + $this->frete;

        return $valorcalculado;
    }


    // abstract public function calcularvalortotal();

    public function getPedido(){
        return $this->pedido;
    }

    public function setPedido($pedido){
        return $this->pedido = $pedido;
    }

    
}
?>