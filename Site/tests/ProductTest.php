<?php

USE PHPUnit\Framework\TestCase;

<<<<<<< Updated upstream
require_once $_SERVER['DOCUMENT_ROOT'] . 'conf/Conexao.php';

=======
>>>>>>> Stashed changes
class ProductTest extends TestCase{

    public function testeCriaProduto(){
        $Produto = new Product('Teste', 'Planta', 20, 2);
        $this->assertInstanceOf(Product::class,$Produto);
    }
<<<<<<< Updated upstream

    // public function testelistarProduto(){
    //     $connection = Conexao::getInstance();

    //     $Produto = new Product('Teste', 'Planta', 20, 2);
    // }

    public function testeremoveProduto(){
        $connection = Conexao::getInstance();

        $Produto = new Product('Teste', 'Planta', 20, 2);
        $this->assertEquals(true, $Produto->removerProduto(1, $connection));        
    }  
    
=======
    public function testeBrancoNome(){
        $Produto = new Product('Teste', 'Planta', 20, 2);
        $this->assertEmpty($Produto->getNome());
    }

>>>>>>> Stashed changes
}

?>