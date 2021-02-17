<?php 

use classes\user\Adm;

try{
    include_once "conf/Conexao.php";
    require_once "vendor/autoload.php";
    
    $pdo = Conexao::getInstance();
    
    $adm = new Adm($pdo);
    }catch(Exception $e){
        echo $e->getCode();
    }
    
    if(!isset($_GET['erro'])){
     $link = "home.php";

     header("location:".$link);
    }
    else{
        echo $adm->mensagemErro($_GET['erro']);
    }
    

    

?>