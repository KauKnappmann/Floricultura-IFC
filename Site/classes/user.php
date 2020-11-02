<?php 
try{
    include_once "../conf/Conexao.php";
    require "mainUsers.php";
    require "adm.php";
     
     $obj = new User(Conexao::getInstance());

     $adm = new Adm(Conexao::getInstance());

   } catch(Exception $e){
      echo "Erro: ". $e->getMessage();
     }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;

        $link = "location:../index.php";

    switch($do){

        case 0; //login
        
        //inicializa sessão
         if(!isset($_SESSION))
          session_start();
        
         
          $login = $obj->login($_POST['email'],$_POST['senha']);

         if($login != 0){
          $_SESSION['login'] = $login[0]; 
          $_SESSION['nome'] = $login[1];
          $_SESSION['perfilPicture'] = $login[2];
         }else
          $link = $link."?erro=0";
         
        break;

        case 1; //cadastro

         if(!isset($_SESSION))
          session_start();

         $infos = array(
          'nome' => $_POST['nome'],
          'sobrenome' => $_POST['sobrenome'],
          'email' => $_POST['email'],
          'senha' => $_POST['senha'],
          'dataNasc' => $_POST['dataNasc'],
          'CPF' => $_POST['CPF'],
          'genero' => $_POST['genero'],
          'telefone' => $_POST['telefone'],
          'img' => $_FILES['imagem']['name']
         );

         //var_dump($infos);

         $cad = $adm->register(1,$infos);
                            
         

         if($cad != "OK!"){
            // descomente isso para achar erros ->
         //   var_dump($cad); 
            $link = $link."?erro=".$cad;
            
         }else{     
            $login = $obj->login($_POST['email'],$_POST['senha']);
          $_SESSION['login'] = $login[0]; 
          $_SESSION['nome'] = $login[1];
          $_SESSION['perfilPicture'] = $login[2];
         }

         break;


    }
    //comente isso para procurar erros:
      header($link);


   // quando for procurar busgs, lembre-se de olhar o banco de dados no MySql, tem algumas coisas como limite de caracteres que pode 
   // ajudar na busca
?>