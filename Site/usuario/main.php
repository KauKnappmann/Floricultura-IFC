<?php 
require_once ('../classes/Upload.class.php');

//setting params
try{
    include_once "../conf/Conexao.php";
    } catch(Exception $e){
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


        //função de login
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

   public function cadastro($nome,$sobrenome,$email,$senha,$dataNasc,$CPF,$genero,$telefone,$imagem){
    
     $split_name = str_split($nome,1);
     $noNum = true;
    foreach($split_name as $i){
         if(is_numeric($i))
         $noNum = false;
     }
     
    if($noNum){

        
         $sql = 'INSERT INTO Usuario(nome,sobrenome,email,senha,dataNasc,CPF,genero,telefone,imagem) 
         VALUES(:nome,:sobrenome,:email,:senha,:dataNasc,:CPF,:genero,:telefone,:imagem)';

         $stmt = $this->pdo->prepare($sql);

        if($telefone == "")
         $telefone  = "undefined";

         $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
         $stmt->bindParam(':sobrenome',$sobrenome, PDO::PARAM_STR);
         $stmt->bindParam(':email',$email, PDO::PARAM_STR);
         $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
         $stmt->bindParam(':dataNasc',$dataNasc, PDO::PARAM_STR);
         $stmt->bindParam(':CPF',$CPF, PDO::PARAM_STR);
         $stmt->bindParam(':genero',$genero, PDO::PARAM_STR);
         $stmt->bindParam(':telefone',$telefone, PDO::PARAM_STR);                   
         $stmt->bindParam(':imagem',$imagem, PDO::PARAM_STR); 

        try{
        $stmt->execute();
         return "OK!";
          }
          catch(Exception $e){
            return $e->getMessage();
          }
    }else
     return "0";

    }

    public function mensagemErro($erro){

        switch($erro){

            case 0:

                echo "Você possui números no nome, e a não ser que você seja filho do Elon Musk, isso não é possivel";

            break;

            case 22001:

                echo "Senha muito longa, se empolgou!";
             
            break;

             



        }

    }
    
}

?>