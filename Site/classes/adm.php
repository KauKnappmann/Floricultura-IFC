<?php 

class Adm{

    function  __construct($pdo){
        $this->pdo = $pdo;
    }

//login
    public function login($email,$senha){
   
        $sql = "Select cod,nome,img from Usuario where email = :email and senha = :senha";

        $stmt = $this->pdo->prepare($sql); 
        $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
        $stmt->bindParam(":senha", $senha, PDO::PARAM_STR); 
        $stmt->execute();

        $login = $stmt->fetchAll();
        if(count($login) > 0)
        return array($login[0]["cod"],$login[0]["nome"],$login[0]["img"]);
          
        else
        return "0";

}

    
//função para registro geral
    public function register($table,$info){

        $sql = "INSERT INTO ";

        $keys = array_keys($info);

        switch ($table){

            case 0:

             $sql = $sql."plantas(nome, tipo, estoque,img, valor) VALUES(";
             $arch = "Plantas/";

            break;

            case 1:

             $sql = $sql."Usuario(nome, sobrenome, email, senha, dataNasc, CPF, genero, telefone, img) VALUES("; 
             $arch = "Usuario/";

            break;

            case 2:

             $sql = $sql."produtos(nome, tipo, estoque, img) VALUES(";
             $arch = "Produtos/";

            break;

        }

        for($i=0;$i<count($info);$i++){
            
             $sql = $sql.":".$keys[$i];

            if($i!=count($keys)-1)
             $sql = $sql.",";
        }

         $sql = $sql.")";

         $stmt = $this->pdo->prepare($sql);

        foreach($info as $name=>&$value){

            if($name == "img" and $value != ''){
                $ext = strtolower(substr($_FILES['imagem']['name'],-4)); 
                $new_name = date("Y.m.d-H.i.s") . $ext; 
                $value = $new_name;
                $dir = '../../Upload/'.$arch; 
                move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); 
            }

            if($value=="")  
             $value = "undefined";
            
            
            $stmt->bindParam(":".$name,$value, PDO::PARAM_STR);
 
        }
        
        try{
            $stmt->execute();
            return "OK!";
        }
        catch(Exception $e){
            //substitua para getMessage para achar erros
          return $e->getMessage();
        }

    }

//função para visualização geral de tabelas
    public function view($table){

        $sql = "select * from ";

        $sql = $sql.$table;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }


//função de deletamento geral
    public function delete($table,$cod){

        $sql = "DELETE FROM ";
    
        switch ($table){
    
            case 0:
    
             $sql = $sql."Plantas WHERE codPlanta = ";
    
            break;
    
            case 1:
    
             $sql = $sql."Usuario WHERE codUsuario = "; 
    
    
            break;
    
            case 2:
    
             $sql = $sql."produtos WHERE codProdutos = ";
    
            break;
    
    
        }
    
        $sql = $sql.$cod;
    
        $stmt = $this->pdo->prepare($sql);
        try{
         $stmt->execute();
         return "OK!";
        }catch(Exception $e){
         return $e->getMessage();
        }
        
    
    }

    public function update($table,$info,$cod){

        $sql = "UPDATE ";
        
        $keys = array_keys($info);

        switch ($table){

            case 0:

             $sql = $sql."plantas SET ";

            break;

            case 1:

             $sql = $sql."Usuario SET "; 

            break;

            case 2:

             $sql = $sql."produtos SET ";

            break;

        }

        for($i=0;$i<count($info);$i++){
            
             $sql = $sql.$keys[$i]." = :".$keys[$i];

            if($i!=count($keys)-1)
             $sql = $sql.",";
        }

         $sql = $sql." WHERE cod =".$cod;
        echo $sql;
         $stmt = $this->pdo->prepare($sql);

        foreach($info as $name=>&$value){

            if($name == "img" and $value != ''){
                $ext = strtolower(substr($_FILES['imagem']['name'],-4)); 
                $new_name = date("Y.m.d-H.i.s") . $ext; 
                $value = $new_name;
                $dir = '../Upload/'; 
                move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); 
            }

            if($value=="")  
             $value = "undefined";
            
            
            $stmt->bindParam(":".$name,$value, PDO::PARAM_STR);
 
        }
        
        try{
            $stmt->execute();
            return "OK!";
        }
        catch(Exception $e){
            //substitua para getMessage para achar erros
          return $e->getMessage();
        }

    }

    public function mensagemErro($erro){

        switch($erro){

            //NÃO COLOQUEM ECHO NOS CASES!!!

            case 0:

                $erro = "Email ou Senha incorretos<br>
                <br><a href='usuario/cadastro.html'>Volte e loge-se novamente</a>";

            break;

            case 22001:

                $erro = "Senha muito longa, se empolgou!<br>
                <br><a href='usuario/cadastro.html'>Volte e cadastre-se novamente</a>";
             
            break;

            case 23000:

                $erro = "email duplicado<br>
                <br><a href='usuario/cadastro.html'>Volte e cadastre-se novamente</a>";

            break;

            case 2345678:

                    //exemplo
                $erro = "ta na hora de molhar o biscoito";

            break;

             



        }
        
        return $erro;

    }

}


?>