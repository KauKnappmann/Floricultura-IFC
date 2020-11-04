<?php

class Product {
    //Atributos variaveis
    private $nomeProduto;
    private $tipoProduto;
    private $valorProduto;
    private $quantidadeProduto;
 
    //Métodos
    public function __construct($nomeProduto, $tipoProduto, $valorProduto, $quantidadeProduto){
        $this->nomeProduto = $nomeProduto;
        $this->tipoProduto = $tipoProduto;
        $this->valorProduto = $valorProduto;
        $this->quantidadeProduto = $quantidadeProduto;
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

    public function removerProduto($Id, $pdo){
        $sql = "DELETE FROM produtos WHERE codProdutos =". $Id;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return true;
    } 


}
?>