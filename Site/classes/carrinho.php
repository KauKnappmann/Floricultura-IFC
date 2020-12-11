<?php

abstract class Pedido{
       //Atributos variaveis
        private $pedido;
        private $numeroPedido;
        private $valorTotal;
 
    //Métodos
    public function __construct($pedido){
        $this->pedido = $pedido;
    }

    public function listar(){
        //lista
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