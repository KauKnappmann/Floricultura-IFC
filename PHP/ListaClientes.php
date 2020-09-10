<?php
require_once('conf/conf.inc.php');
$conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

if (!$conexao) {
  die("Erro ao conectar com o banco de dados..."); //morra, pare com a tudo aqui
}

$sql = 'SELECT * FROM Veterinario';

$comando = $conexao->prepare($sql); //stateman

if (!$comando) {
  die("Erro ao efetuar comando".$conexao->errorInfo());


}
  $comando->execute();
if (!$comando) {
  die("Erro ao efetuar comando".$conexao->errorInfo());
}

$itens = '';

while ($linha = $comando->fetch(PDO::FETCH_ASSOC)) { //fetch = pega os dados do bd;
  $item = file_get_contents('itensVeterinario.html');
  $item = str_replace('{codigo}', $linha['codigo'], $item);
  $item = str_replace('{NomeVeterinario}', $linha['NomeVeterinario'], $item);
  $item = str_replace('{CrmvVeterinario}', $linha['CrmvVeterinario'], $item);
  $item = str_replace('{TelefoneVeterinario}', $linha['TelefoneVeterinario'], $item);

  $itens.= $item; //acumula nessa variavel;
}

$lista = file_get_contents('listaVet.html');
$lista = str_replace('{itens}', $itens, $lista); //ver chave {}
print($lista);
 ?>
