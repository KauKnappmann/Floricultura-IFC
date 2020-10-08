<?php 
require_once ('../classes/Upload.class.php');

//setting params
try{
    include_once "../conf/Conexao.php";
    } catch(Exeption $e){
        echo "Erro: ". $e->getMessage();
    }

     $pdo = Conexao::getInstance();

     //classe de funções usuario;
Class User{
    private $sql;

    // metodo construtor que puxa o pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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

   public function cadastro($nome,$email,$senha,$dataNasc,$CPF,$genero,$telefone,$imagem){
    
     $split_name = str_split($nome,1);
     $noNum = true;
    foreach($split_name as $i){
         if(is_numeric($i))
         $noNum = false;
     }
     
    if($noNum){

        
         $sql = 'INSERT INTO Usuario(nomeUsuario,email,senha,dataNasc,CPF,genero,telefone,imagem) 
         VALUES(:nomeUsuario,:email,:senha,:dataNasc,:CPF,:genero,:telefone,:imagem)';
         $sql = 'INSERT INTO Usuario(nomeUsuario,email,senha,dataNasc,CPF,genero,telefone,imagem) 
         VALUES(:nomeUsuario,:email,:senha,:dataNasc,:CPF,:genero,:telefone,:imagem)';


         $stmt = $this->pdo->prepare($sql);

         $stmt->bindParam(':nomeUsuario',$nome, PDO::PARAM_STR);
         $stmt->bindParam(':email',$email, PDO::PARAM_STR);
         $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
         $stmt->bindParam(':dataNasc',$dataNasc, PDO::PARAM_STR);
         $stmt->bindParam(':CPF',$CPF, PDO::PARAM_STR);
         $stmt->bindParam(':genero',$genero, PDO::PARAM_STR);
         $stmt->bindParam(':telefone',$telefone, PDO::PARAM_STR);                   
         $stmt->bindParam(':imagem',$imagem, PDO::PARAM_STR); 

        if($telefone == "")
         $telefone  = "undefined";

        try{
        $stmt->execute();
         return "OK!";
          }
          catch(PDOException $e){
            return $e['code'];
          }
    }else
    return "0";

   }

    
}

?>