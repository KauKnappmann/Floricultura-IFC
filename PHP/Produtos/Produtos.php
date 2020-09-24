<?php 

//set params

    include_once "../conf/Conexao.php";
    $pdo = Conexao::getInstance();
 
   
    
    $do = isset($_POST['doit']) ? $_POST['doit'] : 0;
    $query = "";
    
    switch($do){
    
         case 0:

         $query = "SELECT * FROM tipoPlanta;";
         $consulta=$pdo->query("{$query}");
         $option = "";

         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
             if($option != null)
             $option = $option.'<option value="'.$linha['nomeTipoPlanta'].'"> '.$linha['nomeTipoPlanta'].' </option> \n';
             else
             $option = '<option value="'.$linha['nomeTipoPlanta'].'"> '.$linha['nomeTipoPlanta'].' </option> n';
         }

        $page = file_get_contents("PlantaType.html");

        $option = str_replace("{options}",$option, $page);

         file_put_contents("PlantaType.html", $option);

         header("local:PlantaType.html");

         //echo(str_replace("teste",$option, $page));

//          $contents = file_get_contents ("step-second-test.php");

// $contents = str_replace(array("7NT0j5dB2QMyWv96nXIDgaR4PJ"), generateRandomString($length = 26), $contents);
// file_put_contents("step-second-test.php", $contents);

         break; 
        
         //cadastro de plantas
         case 1;

             $nome = $_POST['nome'];
             $tipo = $_POST['tipo'];
             $img = $_POST['img'];
             $valor = $_POST['valor'];
             $descricao = $_POST['descricao'];
             $estoque = $_POST['estoque'];

             $query = "INSERT INTO plantas(nomePlanta,tipoPlanta,imgPlanta,valorPlanta,descricaoPlanta,estoquePlanta) 
             VALUES(:nome,:tipo,:img,:valor,:descricao,:estoque)";

             $stmt = $pdo->prepare("{$query}");

             $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
             $stmt->bindParam(':tipo',$tipo, PDO::PARAM_STR);
             $stmt->bindParam(':img',$img, PDO::PARAM_STR);
             $stmt->bindParam(':valor',$valor, PDO::PARAM_STR);
             $stmt->bindParam(':descricao',$descricao, PDO::PARAM_STR);
             $stmt->bindParam(':estoque',$estoque, PDO::PARAM_STR);        
 
             $stmt->execute();

             break;


             case 2:

                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $query = "INSERT INTO tipoPlantas(nomeTipoPlanta,descricaoTipoPlanta) 
                VALUES(:nome,:descricao)";

                $stmt = $pdo->prepare("{$query}");
   
                $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
                $stmt->bindParam(':descricao',$descricao, PDO::PARAM_STR);

                $stmt->execute();

             break;
    
    
    }
?>