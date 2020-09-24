<!DOCTYPE html>
<?php 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$title = "Plantas";
$pesquisa = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
  
</head>
<body>
    

	<form method="post">
    <input type="text" name="pesquisa" id="pesquisa" value="<?php echo $pesquisa; ?>">
    <input type="submit" value="Pesquisar">
	</form>
<br>
    <table border="1">
       <tr><td><b>Código</b></td>
        <td><b>Nome da Planta</b></td> 
        <td><b>Tipo de Planta</b></td>
        <td><b>Quantidade no Estoque</b></td>     
    </tr>
    <?php 
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM plantas 
                             WHERE nomePlanta 
                             LIKE '%$pesquisa%' OR tipoPlanta LIKE '%$pesquisa%' ");
    
    
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        ?>
        <tr><td><?php echo $linha['codPlanta'];?></td>
            <td><?php echo $linha['nomePlanta'];?></td>
            <td><?php echo $linha['tipoPlanta'];?></td>
            <td><?php echo $linha['estoquePlanta'];?></td>
            

            
        </tr>
    <?php } ?>       
    </table>
</body>
</html>
	