<?php 
try{
    include_once "../conf/Conexao.php";
    require "main.php";
    } catch(Exeption $e){
         echo "Erro: ". $e->getMessage();
        }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;
        
     $obj = new User(Conexao::getInstance());
    switch($do){

        case 0; //login

         $_COOKIE["login"] = $obj->login($_POST['email'],$_POST['senha']); 
         if($_COOKIE["login"] == "0")
            echo "dados incorretos";
         
         
        break;

         case 1; //cadastro

         $telefone = $_POST['telefone'];
        if($telefone=="")
            $telefone = "undefined";

         $cad = $obj->cadastro( $_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['dataNasc'],$_POST['genero'],$_POST['CPF'],$telefone);

        if($cad != "OK!")
         echo $cad['code'];

         break;



    }

?>