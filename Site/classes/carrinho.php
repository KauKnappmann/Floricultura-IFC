<?php

class Pedido{
       //Atributos variaveis
        private $pedido;
 
    //Métodos
    public function __construct($pedido){
        $this->pedido = $pedido;
    }

    public function listar(){
        //lista
    }

    public function getPedido(){
        return $this->pedido;
    }

    public function setPedido($pedido){
        return $this->pedido = $pedido;
    }

    
}
?>