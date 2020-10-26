<?php 

class Plant{
    private $sql

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


        public function cadPlant ($nome,$tipo,$img,$qnt){
        
            $sql = 'INSERT INTO plantas(nomePlanta,tipoPlanta,imgPlanta,estoquePlanta) 
            VALUES(:nome,:tipo,:img,:estoque)';
   
            $stmt = $this->pdo->prepare($sql);
   
            $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
            $stmt->bindParam(':tipo',$tipo, PDO::PARAM_STR);
            $stmt->bindParam(':img',$img, PDO::PARAM_STR);
            $stmt->bindParam(':estoque',$qnt, PDO::PARAM_INT);
            
            
            if($img != ''){
                 $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                 $img = $new_name;
                 $dir = '../Upload/'; //Diretório para uploads 
                 move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            }


        }



}


?>