<?php

USE PHPUnit\Framework\TestCase;

require $_SERVER['DOCUMENT_ROOT'] . 'conf/Conexao.php';

require "../classes/adm.php";

$adm = new Adm(Conexao::getInstance());

$adm->view(0);

?>