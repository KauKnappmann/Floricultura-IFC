<?php 
//setting params
require_once ('Upload.class.php');


    

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

     $noNum = $this->noNumName($nome);
    if($noNum)
    $noNum = $this->noNumName($sobrenome);
     
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
         
         if($imagem != '')
 {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $imagem = $new_name;
    $dir = '../Upload/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
 }

        try{
        $stmt->execute();
        //$token = sha1($email)
         return "OK!";
          }
          catch(Exception $e){
              //troca para return $e->getMessage(); na hora de procurar codigos de erro:
            return $e->getCode();
          }
    }else
     return "0";

    }

    private function noNumName($name){
        $split_name = str_split($name,1);
        foreach($split_name as $i){
            if(is_numeric($i))
            return false;
        }
        return true;
    }

    public function mensagemErro($erro){

        switch($erro){

            //NÃO COLOQUEM ECHO NOS CASES!!!

            case 0:

                $erro = "Você possui números no nome ou sobrenome, e, a não ser que você seja filho do Elon Musk, isso não é possivel<br>
                <br><a href='usuario/cadastro.html'>Volte e cadastre-se novamente</a>";

            break;

            case 22001:

                $erro = "Senha muito longa, se empolgou!<br>
                <br><a href='usuario/cadastro.html'>Volte e cadastre-se novamente</a>";
             
            break;

            case 23000:

                $erro = "email duplicado<br>
                <br><a href='usuario/cadastro.html'>Volte e cadastre-se novamente</a>";

            break;



             



        }
        
        return $erro;

    }
    
}

?>