<?php 

class Adm{

    function  __construct($pdo){
        $this->pdo = $pdo;
    }

    

    public function register($table,$info){

        $sql = "insert into ";

        switch ($table){

            case 0:

                $sql = $sql."Plantas(nomePlanta, tipoPlanta, imgPlanta, estoquePlanta) values(";

           break;

           case 1:

            $sql = $sql."Usuario(nomeUsuario, email, senha, dataNasc, CPF, genero, telefone) values("; 


           break;

           case 2:

            $sql = $sql."Produtos(nomeProdutos, estoqueProdutos, tipoProdutos, imgProdutos) values(";

           break;

        }

        for($i=0;$i<count(array_keys($info));$i++){
            
            $sql = $sql.":".array_keys($info)[$i];

            if($i!=count(array_keys($info))-1)
            $sql = $sql.",";
        }

        $sql = $sql.")";

        echo $sql;

    }

    public function view($table){

        $sql = "select * from ";

        switch ($table){

            case 0:

                 $sql = $sql."plantas";

            break;

            case 1:

             $sql = $sql."Usuario"; 


            break;

            case 2:

             $sql = $sql."produtos";

            break;


        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

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