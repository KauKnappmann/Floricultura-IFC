<?php

require_once('ProdutoCarrinho.php');

class Pedido extends ProdutoCarrinho{
       //Atributos variaveis
        private $pedido;
        private $numeroPedido;
        private $valorTotal;
 
    //Métodos
    public function __construct($pedido, $nomeProduto, $valorProduto, $quantidadeProduto, TipoProduto $tp){
        $this->pedido = $pedido;
        parent::__construct($nomeProduto, $valorProduto, $quantidadeProduto, $tp, $pedido);
    }

    public function imprimir(){
        $texto = parent::imprimir();
        $texto .= "Valor total: ".parent::getvalorTotal();

        return $texto;
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