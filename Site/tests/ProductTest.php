<?php

USE PHPUnit\Framework\TestCase;

require_once $_SERVER['DOCUMENT_ROOT'] . 'conf/Conexao.php';

class ProductTest extends TestCase{

    public function testeCriaProduto(){
        $Produto = new Product('Teste', 'Planta', 20, 2);
        $this->assertInstanceOf(Product::class,$Produto);
    }

    // public function testelistarProduto(){
    //     $connection = Conexao::getInstance();

    //     $Produto = new Product('Teste', 'Planta', 20, 2);
    // }

    public function testeremoveProduto(){
        $connection = Conexao::getInstance();

        $Produto = new Product('Teste', 'Planta', 20, 2);
        $this->assertEquals(true, $Produto->removerProduto(1, $connection));        
    }  
    
}

?>