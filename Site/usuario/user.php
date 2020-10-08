<?php 
try{
    include_once "../conf/Conexao.php";
    require "main.php";
    } catch(Exception $e){
         echo "Erro: ". $e->getMessage();
        }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;
        
     $obj = new User(Conexao::getInstance());
    switch($do){

        case 0; //login
        
        //inicializa sessão
        if(!isset($_SESSION))
        session_start();
        
         
         $_SESSION['login'] = $obj->login($_POST['email'],$_POST['senha']); 
         
        break;

         case 1; //cadastro

<<<<<<< HEAD
         $cad = $obj->cadastro( $_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['dataNasc'],$_POST['genero'],$_POST['CPF'],$_POST['telefone']);
=======
         $echonumero = "Você inseriu um número no nome!";
         $telefone = $_POST['telefone'];
        if($telefone=="")
            $telefone = "undefined";

         $cad = $obj->cadastro( $_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['dataNasc'],$_POST['genero'],$_POST['CPF'],$telefone, $_POST['imagem']);
>>>>>>> 2f4e033141553957f52deb86c1991986709265c5

        if($cad != "OK!"){
         echo $cad; 
        }
        
        
         break;



    }
    header('location:../index.php');
?>