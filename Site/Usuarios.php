<?php 


//set params
try{
include_once "../conf/Conexao.php";
//echo "estou sentindo uma conexão entre nós";
} catch(Exception $e){
    echo "Erro: ". $e->getMessage();
}

$do = isset($_POST['doit']) ? $_POST['doit'] : 0;
$pdo = Conexao::getInstance();





//----------------------------------------------------------------
echo $do;
switch($do){

    //caso de login de N user;
    case 0:
        var_dump($_POST);
        $email = $_POST['email'];                       
        $senha = $_POST['senha'];

        $consulta=$pdo->query('SELECT * FROM Usuario WHERE email = "'.$email.'" AND senha = "'.$senha.'" ;');

     while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo "usuario: ".$linha['email']." logado com sucesso";
     }





        $email = $_POST['email'];                       
        $senha = $_POST['senha'];

         $sql = "Select codUsuario from Usuario where email = :email and senha = :senha";

         $stmt = $pdo->prepare($sql); 
         $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
         $stmt->bindParam(":senha", $senha, PDO::PARAM_STR); 
         $stmt->execute();

         $login = $stmt->fetchAll();
         if(count($login) > 0){
          $_COOKIE["login"] = $login[0];
            }
        
                   
      
    break;

//----------------------------------------------------------------

    //caso de cadastro de commom user;
    case 1:
        
        $stmt = $pdo->prepare('INSERT INTO Usuario(nomeUsuario,email,senha,dataNasc,CPF,genero,telefone) 
        VALUES(:nomeUsuario,:email,:senha,:dataNasc,:CPF,:genero,:telefone)');

        $stmt->bindParam(':nomeUsuario',$nome, PDO::PARAM_STR);
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
        $stmt->bindParam(':dataNasc',$dataNasc, PDO::PARAM_STR);
        $stmt->bindParam(':CPF',$CPF, PDO::PARAM_STR);
        $stmt->bindParam(':genero',$genero, PDO::PARAM_STR);
        $stmt->bindParam(':telefone',$telefone, PDO::PARAM_STR);

        $nome = $_POST['nome'];                       
        $email = $_POST['email'];                      
        $senha = $_POST['senha'];                      
        $dataNasc = $_POST['dataNasc'];                       
        $genero = $_POST['genero'];                       
        $CPF = $_POST['CPF'];                       
        $telefone = $_POST['telefone'];                       

       if($telefone == "")
       {$telefone  = "undefined";}
 
       $stmt->execute();

    break;

    

}




?>