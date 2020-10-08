<?php 
<<<<<<< HEAD
//require_once ('classes/Upload.class.php');
=======
require_once ('../classes/Upload.class.php');
>>>>>>> 2f4e033141553957f52deb86c1991986709265c5

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

<<<<<<< HEAD
        // função de cadastro
    public function cadastro($nome,$email,$senha,$dataNasc,$CPF,$genero,$telefone){

=======
   public function cadastro($nome,$email,$senha,$dataNasc,$CPF,$genero,$telefone,$imagem){
    
>>>>>>> 2f4e033141553957f52deb86c1991986709265c5
     $split_name = str_split($nome,1);
     $noNum = true;
    foreach($split_name as $i){
         if(is_numeric($i))
         $noNum = false;
     }
     
    if($noNum){

<<<<<<< HEAD
         $destino = "Images/".$_FILES['imagem']['name'];
         move_uploaded_file($_FILES['imagem']['tmp_name'],$destino);

=======
        
>>>>>>> 2f4e033141553957f52deb86c1991986709265c5
         $sql = 'INSERT INTO Usuario(nomeUsuario,email,senha,dataNasc,CPF,genero,telefone,imagem) 
         VALUES(:nomeUsuario,:email,:senha,:dataNasc,:CPF,:genero,:telefone,:imagem)';
         $sql = 'INSERT INTO Usuario(nomeUsuario,email,senha,dataNasc,CPF,genero,telefone,imagem) 
         VALUES(:nomeUsuario,:email,:senha,:dataNasc,:CPF,:genero,:telefone,:imagem)';


         $stmt = $this->pdo->prepare($sql);

        if($telefone == "")
         $telefone  = "undefined";

         $stmt->bindParam(':nomeUsuario',$nome, PDO::PARAM_STR);
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
<<<<<<< HEAD
        catch(PDOException $e){
         return $e['code'];
=======
          catch(PDOException $e){
            return $e['code'];
>>>>>>> 2f4e033141553957f52deb86c1991986709265c5
          }
    }else
     return "0";

    }

    
}

?>