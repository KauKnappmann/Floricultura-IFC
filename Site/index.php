<?php 
try{
    include_once "conf/Conexao.php";
    require "classes/mainUsers.php";
    require "classes/adm.php";
    
    $pdo = Conexao::getInstance();
    $user = new User($pdo);
    $adm = new Adm($pdo);
    }catch(Exception $e){
        echo $e->getCode();
    }

    $array = array(
        "estoquePlanta"=> "7"
    );
    
    $adm->update(0,$array,1);

?>