<?php
include_once "conf/Conexao.php";
$pdo = Conexao::getInstance();



if(!isset($_SESSION))
    session_start();   
    
    if(isset($_SESSION['login'])){
    $_SESSION['login'];
    
    $sql = "Select nome,sobrenome from Usuario where codUsuario = :cod";

    $stmt = $pdo->prepare($sql); 
    $stmt->bindParam(":cod", $_SESSION['login'], PDO::PARAM_STR); 
    $stmt->execute();

    $login = $stmt->fetchAll();

echo "Bem vindo usuario ".$login[0]['nome'];
}


$sql = "Select codUsuario from Usuario where email = :email and senha = :senha";
   


//echo $_SESSION["login"];
//header("location:index.html");
?>