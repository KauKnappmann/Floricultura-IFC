<?php 

class Adm{

    function  __construct($pdo){
        $this->pdo = $pdo;
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

   

}


?>