<?php

USE PHPUnit\Framework\TestCase;

require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/Conexao.php';

class testeAddUser extends TestCase{
        public function CriarUser(){
            $Usuario = new usuario('TesteKauana', 'Kauana', 'kauanak21@gmail.com', 'Senha123', '2002-04-25', 
            '11111111111','feminino', '988778854');
            $this->assertInstanceOf(usuario::class,$Usuario);
        }
    
        public function RemoveUser(){
            $connection = Conexao::getInstance();
    
            $Usuario = new usuario('TesteKauana', 'Kauana', 'kauanak21@gmail.com', 'Senha123', '2002-04-25', 
            '11111111111','feminino', '988778854');
            $this->assertEquals(true, $Usuario->RemoveUser(1, $connection));        
        }
}