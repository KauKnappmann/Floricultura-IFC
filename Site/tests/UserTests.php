<?php

USE PHPUnit\Framework\TestCase;

require '../conf/Conexao.php';

require "../classes/adm.php";

$adm = new Adm(Conexao::getInstance());

$adm->view(0);

// $planta = array(
//     'nomePlanta' => "planta",
//     'tipoPlanta' => "arvore",
//     'estoquePlanta' => "7",
//     'img' => ""
// );
// var_dump($adm-> register(0,$planta));

//other 

$infos = array(
    'nome' => "kauana",
    'sobrenome' => "knappmann",
    'email' => "kauank21@gmail.com",
    'senha' => "Senha123",
    'dataNasc' => "2002-04-25",
    'CPF' => "11111111111",
    'genero' => "feminino",
    'telefone' => "988778854",
    'hashPassword' => "",
    'img' => ""
   );

   // var_dump($adm->register(1,$infos));

    var_dump($adm->delete(1,1));

?>