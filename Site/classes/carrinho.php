<?php

abstract class Pedido extends ProdutoCarrinho{
       //Atributos variaveis
        private $pedido;
        private $numeroPedido;
        private $valorTotal;
 
    //Métodos
    public function __construct($pedido){
        $this->pedido = $pedido;
    }

    public function imprimir(){
        $texto = parent::imprimir();
        $texto = "Valor total: ".$this->getvalorTotal();
    }

    public function getvalorTotal(){
        return $this->valorTotal;
    }

    abstract public function calcularvalortotal();

    public function getPedido(){
        return $this->pedido;
    }

    public function setPedido($pedido){
        return $this->pedido = $pedido;
    }

    
}
?>