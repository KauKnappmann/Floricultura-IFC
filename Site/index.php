
    <?php
include_once "conf/Conexao.php";
require "classes/mainUsers.php";
require "classes/adm.php";

$pdo = Conexao::getInstance();
$user = new User(Conexao::getInstance());
$adm = new Adm(Conexao::getInstance());

$html = file_get_contents("index.html");



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

            $html = str_replace('{{nome}}',"<center>BEM VINDO ".strtoupper($_SESSION['nome'])."</center>",$html);

     
    //  echo "Bem vindo usuario ".$_SESSION['nome'];
    //  echo "<img class='fotoIcon' src='Upload/".$_SESSION['perfilPicture']."'>";
    //  echo "<br><br><form method='POST'><button type='submit' value='true' name='logout'>deslogar</button></form>";   
     

    }
}else
 echo $adm->mensagemErro($_GET['erro']);

    $plantas = $adm->view(0);
    $plantas_sub = "";

    if(count($plantas)>0)
    //foreach($plantas as $planta){
        $plantas_sub = $plantas_sub."<img class='fotoIcon' src='css/Images/".$plantas[0]['img']."><br>\n";
        $plantas_sub = $plantas_sub."<h3>".$plantas[0]['nomePlanta']."</h3>\n";
        $plantas_sub = $plantas_sub."<h5>".$plantas[0]['tipoPlanta']."</h5><br><br>\n\n";
    //}
    
    $html = str_replace('{{produtos}}',$plantas_sub,$html);
//header("location:index.html");
echo $html;
?>
