<?php 

//setting params
try{
    include_once "../conf/Conexao.php";
    } catch(Exeption $e){
        echo "Erro: ". $e->getMessage();
    }

     $pdo = Conexao::getInstance();

Class User{
    private $sql;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        //login("asd","asd");
    }


    public function login($email,$senha){
   
            $sql = "Select codUsuario from Usuario where email = :email and senha = :senha";
   
            $stmt = $this->pdo->prepare($sql); 
            $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
            $stmt->bindParam(":senha", $senha, PDO::PARAM_STR); 
            $stmt->execute();
   
            $login = $stmt->fetchAll();
            if(count($login) > 0)
            return $login[0]["codUsuario"];
               
            else
            return "0";

    }

   public function cadastro($nome,$email,$senha,$dataNasc,$CPF,$genero,$telefone){

    $sql = 'INSERT INTO Usuario(nomeUsuario,email,senha,dataNasc,CPF,genero,telefone) 
    VALUES(:nomeUsuario,:email,:senha,:dataNasc,:CPF,:genero,:telefone)';

    $stmt = $this->pdo->prepare($sql);

    $stmt->bindParam(':nomeUsuario',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
    $stmt->bindParam(':dataNasc',$dataNasc, PDO::PARAM_STR);
    $stmt->bindParam(':CPF',$CPF, PDO::PARAM_STR);
    $stmt->bindParam(':genero',$genero, PDO::PARAM_STR);
    $stmt->bindParam(':telefone',$telefone, PDO::PARAM_STR);                   

   if($telefone == "")
   $telefone  = "undefined";

   try{
   $stmt->execute();
   return "OK!";
    }
    catch(PDOException $e){
        return $e;
    }

   }

    
}

$obj = new User($pdo);
$aa=$obj->cadastro("a","a","a","2020-09-15","009","F","");

//var_dump($aa);
?>