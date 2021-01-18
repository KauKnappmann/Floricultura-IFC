<?php

class Product {
    //Atributos variaveis
    private $nomeProduto;
    private $tipoProduto;
    private $valorProduto;
    private $quantidadeProduto;
 
    //Métodos
    public function __construct($nomeProduto, $valorProduto, $quantidadeProduto, TipoProduto $tp){
        $this->nomeProduto = $nomeProduto;
        $this->valorProduto = $valorProduto;
        $this->quantidadeProduto = $quantidadeProduto;
        $this->tipoProduto = $tp;
    }

    public function getNome(){
        return $this->nomeProduto;
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


}
?>