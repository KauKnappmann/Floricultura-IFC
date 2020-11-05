<?php

USE PHPUnit\Framework\TestCase;

require '../conf/Conexao.php';

require "../classes/adm.php";

$adm = new Adm(Conexao::getInstance());

$adm->view(0);

$planta = array(
    'nomePlanta' => "planta",
    'tipoPlanta' => "arvore",
    'estoquePlanta' => "7",
    'img' => ""
);
var_dump($adm-> register(0,$planta));

//other 

// $infos = array(
//     'nome' => "mateus",
//     'sobrenome' => "bailich",
//     'email' => "mateuseee@m,com",
//     'senha' => "Senha123",
//     'dataNasc' => "2019-01-01",
//     'CPF' => "11111111111",
//     'genero' => "M",
//     'telefone' => "98877887",
//     'img' => ""
//    );

//    $adm->register(1,$infos);

?>