<?php

class Product {
    //Atributos variaveis
    private $nomeProduto;
    private $tipoProduto;
    private $valorProduto;
    private $quantidadeProduto;
<<<<<<< Updated upstream
 
=======

>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
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


=======
    public function listarProduto(){
        echo 'Nome do Produto:' .$this->nomeProduto.', Tipo do produto:'.$this->tipoProduto;
    }
>>>>>>> Stashed changes
}
?>