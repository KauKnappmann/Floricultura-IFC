<?php

class TipoProduto {
    //Atributos variaveis
    private $tipoProduto;
 
    //Métodos
    public function __construct($tipoProduto){
        $this->tipoProduto = $tipoProduto;
    }

    public function getTipoProduto(){
        return $this->tipoProduto;
    }

    public function setTipoProduto($tipoProduto){
        return $this->tipoProduto = $tipoProduto;
    }

    public function removerProduto($Id, $pdo){
        $sql = "DELETE FROM produtos WHERE codProdutos =". $Id;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return true;
    } 
    


}
?>