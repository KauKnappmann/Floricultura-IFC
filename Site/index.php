<html>
    
    <?php
include_once "conf/Conexao.php";
$pdo = Conexao::getInstance();

$logout = isset($_POST['logout']) ? $_POST['logout'] : false;

if($logout){
    $logout= false;
    echo "deslogado";
    $_SESSION['login'] = 0;  
}

if(!isset($_SESSION))
    session_start();   
    
    if(isset($_SESSION['login']))
        if($_SESSION['login'] != 0){
    
    
    $sql = "Select nome,sobrenome from Usuario where codUsuario = :cod";

    $stmt = $pdo->prepare($sql); 
    $stmt->bindParam(":cod", $_SESSION['login'], PDO::PARAM_STR); 
    $stmt->execute();

    $login = $stmt->fetchAll();

echo "Bem vindo usuario ".$login[0]['nome'];
echo "<br><br><form method='POST'><button type='submit' value='true' name='logout'>deslogar</button></form>";
}



$sql = "Select codUsuario from Usuario where email = :email and senha = :senha";
   


//echo $_SESSION["login"];
header("location:index.html");
?>



</html>