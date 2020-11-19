<?php
        try{
include_once "conf/Conexao.php";

require "classes/adm.php";

$pdo = Conexao::getInstance();
$adm = new Adm($pdo);
}catch(Exception $e){
    echo $e->getCode();
}


$html = file_get_contents("home.html");


$logout = isset($_POST['logout']) ? $_POST['logout'] : false;


if($logout){
    $logout= false;
    echo "deslogado";
    $_SESSION['login'] = 0;  
}


if(!isset($_SESSION))
    session_start();   

 $_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : 0;

if (!isset($_GET['erro'])){
    if(isset($_SESSION['login']))
        if($_SESSION['login'] != 0){
            
            $html = str_replace('{{nome}}',"<center>BEM VINDO ".strtoupper($_SESSION['nome'])."</center>",$html);

     
     echo "Bem vindo usuario ".$_SESSION['nome'];
     echo "<img class='fotoIcon' src='Upload/".$_SESSION['perfilPicture']."'>";
     echo "<br><br><form method='POST'><button type='submit' value='true' name='logout'>deslogar</button></form>";   
     

    }else
    $html = str_replace('{{nome}}',"<p></p> ",$html);
        

}else
 echo $adm->mensagemErro($_GET['erro']);




 //CATALOGO
    $plantas = $adm->view("plantas");
    $plantas_sub = "";

    if(count($plantas)>0)
    foreach($plantas as $planta){   
        $plantas_sub = $plantas_sub."<img class='fotoIcon' src='Upload/Plantas/".$planta['img']."'><br>\n";
        $plantas_sub = $plantas_sub."<h3>".$planta['nomePlanta']."</h3>\n";
        $plantas_sub = $plantas_sub."<h5>".$planta['tipoPlanta']."</h5><br><br>\n\n";
    }
    
    $html = str_replace('{{produtos}}',$plantas_sub,$html);
//header("location:index.html");
echo $html;
?>
