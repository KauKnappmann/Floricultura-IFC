<?php 
try{
    include_once "../../conf/Conexao.php";

    require "../adm.php";
     
  

     $adm = new Adm(Conexao::getInstance());

   } catch(Exception $e){
      echo "Erro: ". $e->getMessage();
     }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;

        $link = "location:../../home.php";

    switch($do){

        case 0: //cadastro

          $table = $_POST['table'];

          $info = array();

         foreach($_POST as $name=>$value)
         if($name != 'table')
            $info[$name] = $value;
            
         $info['img'] = $_FILES['imagem']['name'];
         
         var_dump($info);

         $cad = $adm->register($table,$info);
         var_dump($cad);
         if($cad != "OK!" || $table != 1){
            // descomente isso para achar erros ->
         //   var_dump($cad); 
         
          $link = $link."?erro=".$cad;
          break;
         }
         
        case 1: //login
        
        //inicializa sessão
         if(!isset($_SESSION))
          session_start();
        
         
          $login = $adm->login($_POST['email'],$_POST['senha']);

         if($login != 0){
          $_SESSION['login'] = $login[0]; 
          $_SESSION['nome'] = $login[1];
          $_SESSION['perfilPicture'] = $login[2];
         }else
          $link = $link."?erro=0";

         break;


    }
    //comente isso para procurar erros:
    //var_dump($_SESSION);
      //header($link);


   // quando for procurar busgs, lembre-se de olhar o banco de dados no MySql, tem algumas coisas como limite de caracteres que pode 
   // ajudar na busca
?>