<html>
    
    <?php
include_once "conf/Conexao.php";
require "classes/mainUsers.php";
require "classes/adm.php";
$pdo = Conexao::getInstance();
$user = new User(Conexao::getInstance());
$adm = new Adm(Conexao::getInstance());

$logout = isset($_POST['logout']) ? $_POST['logout'] : false;


if($logout){
    $logout= false;
    echo "deslogado";
    $_SESSION['login'] = 0;  
}


if(!isset($_SESSION))
    session_start();   
    
if (!isset($_GET['erro'])){
    if(isset($_SESSION['login']))
        if($_SESSION['login'] != 0){

     echo "Bem vindo usuario ".$_SESSION['nome'];
     echo "<br><br><form method='POST'><button type='submit' value='true' name='logout'>deslogar</button></form>";   
    }
}else
 echo $adm->mensagemErro($_GET['erro']);


$sql = "Select codUsuario from Usuario where email = :email and senha = :senha";
  // var_dump($adm->delete(1));
   //var_dump($adm->view(1));

   $teste = array(
    'nomeUsuario' =>"tanto faz",
     'email' =>"tanto faz",
     'senha' =>"tanto faz",
     'dataNasc' =>"tanto faz",
     'CPF' => "12345678910",
     'genero' => "hot wheels",
     'telefone'=> ""
   );
    echo "<br>";$adm->register(1,$teste);
   //var_dump(array_keys($array));

//echo $_SESSION["login"];
//header("location:index.html");
?>



</html>