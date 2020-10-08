<?php
include_once "conf/Conexao.php";
$pdo = Conexao::getInstance();



if(!isset($_SESSION)){
    session_start();    
    echo $_SESSION['login'];
}else
echo "n foi";
//echo $_SESSION["login"];
//header("location:index.html");
?>