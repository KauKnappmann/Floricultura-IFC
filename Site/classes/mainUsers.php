<?php 
//setting params



    

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
   
             $sql = "Select codUsuario,nomeUsuario,img from Usuario where email = :email and senha = :senha";
   
             $stmt = $this->pdo->prepare($sql); 
             $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
             $stmt->bindParam(":senha", $senha, PDO::PARAM_STR); 
             $stmt->execute();
   
             $login = $stmt->fetchAll();
             if(count($login) > 0)
             return array($login[0]["codUsuario"],$login[0]["nomeUsuario"],$login[0]["img"]);
               
             else
             return "0";

    }

   public function cadastro($nome,$sobrenome,$email,$senha,$dataNasc,$CPF,$genero,$telefone,$imagem){


        
         $sql = 'INSERT INTO Usuario(nomeUsuario,sobrenome,email,senha,dataNasc,CPF,genero,telefone,img) 
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
     
         if($imagem != '')
 {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $imagem = $new_name;
    $dir = '../Upload/Usuario/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
 }

        try{
        
        //$token = sha1($email)
         return "OK!";
          }
          catch(Exception $e){
              //troca para return $e->getMessage(); na hora de procurar codigos de erro:
            return $e->getMessage();
          }
        }


    
    
}

?>