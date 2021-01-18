<?php

require_once('carrinho.php');

class ProdutoCarrinho {
    //Atributos variaveis
    private $nomeProduto;
    private $tipoProduto;
    private $valorProduto;
    private $quantidadeProduto;
    private $pedido;
 
    //Métodos
    public function __construct($nomeProduto, $valorProduto, $quantidadeProduto, TipoProduto $tp, $pedido){
        $this->nomeProduto = $nomeProduto;
        $this->valorProduto = $valorProduto;
        $this->quantidadeProduto = $quantidadeProduto;
        $this->tipoProduto = $tp;
        $this->addPedidos($pedido);
    }


    public function imprimir(){
        $texto = "Nome: ".$this->getnomeProduto(). "Valor do produto: ".$this->getvalorProduto(). "Quantidade: ".$this->getquantidadeProduto(). "Tipo: ".$this->getTipoProduto();

        return $texto;
    }

    public function getnomeProduto(){
        return $this->nomeProduto;
    }

    public function getvalorProduto(){
        return $this->valorProduto;
    }

    public function getquantidadeProduto(){
        return $this->quantidadeProduto;
    }


    // public function listarProduto($Id, $pdo){
    //     $sql = "SELECT * FROM produtos WHERE codProdutos =". $Id;

    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute();

    //     return $stmt->fetchAll();
    // }

    public function removerProduto(int $Id, $pdo){
        $sql = "DELETE FROM produtos WHERE codProdutos =". $Id;
        
        $pdo->query($sql);

        return true;
    } 

    public function getTipoProduto(){
        return $this->tipoProduto;
    }

    public function setTipoProduto($tipoProduto){
        return $this->tipoProduto = $tipoProduto;
    }

    public function addPedidos($pedido){
        $this->pedido[] = new Pedido($pedido); 
    }

    public function getPedidos(){
        return $this->pedido;
    }

}
?>