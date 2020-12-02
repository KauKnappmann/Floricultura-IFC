<?php 

    include_once "../../conf/Conexao.php";

    require "../adm.php";

    $adm = new Adm(Conexao::getInstance());

   } catch(Exception $e){
      echo "Erro: ". $e->getMessage();
     }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;

        $link = "location:../../home.php";

      
?>