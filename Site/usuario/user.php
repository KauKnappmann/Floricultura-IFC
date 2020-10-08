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
        

         $cad = $obj->cadastro( $_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['dataNasc'],$_POST['genero'],
                                $_POST['CPF'],$_POST['telefone'], $_POST['imagem']);
                            
        if($cad != "OK!"){
         
        
         
        }
        
        
         break;



    }
    //header('location:../index.php');
?>