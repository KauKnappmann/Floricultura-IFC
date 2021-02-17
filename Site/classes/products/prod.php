<?php 

   use classes\user\Adm;

   include_once "../../conf/Conexao.php";

   require_once "../../vendor/autoload.php";

   $adm = new Adm(Conexao::getInstance());

   $do = isset($_POST['doit']) ? $_POST['doit'] : 0;

   $link = "location:../../home.php";

?>