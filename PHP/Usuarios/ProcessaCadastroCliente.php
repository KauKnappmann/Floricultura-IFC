<?php
if (isset($_GET['nome'])){//dados enviados
  //salvar cadastro no banco
  require_once('conf/conf.inc.php');
  $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

  if (!$conexao) {
    die("Erro ao conectar com o banco de dados..."); //morra, pare com a tudo aqui
  }

  $Nome = $_GET['NomeVeterinario'];
  $CRMV = $_GET['CrmvVeterinario'];
  $Telefone = $_GET['TelefoneVeterinario'];

  //definir o comando que será executado no bd
  $sql = 'INSERT INTO Veterinario (NomeVeterinario, CrmvVeterinario, TelefoneVeterinario)
                VALUES (:NomeVeterinario, :CrmvVeterinario, :TelefoneVeterinario)';

  //prepara o comando para executar
  $comando = $conexao->prepare($sql); //stateman

  //parametros com as variaveis, fazendo vinculos
  $comando->bindParam(':NomeVeterinario', $nome);
  $comando->bindParam(':CrmvVeterinario', $crmv);
  $comando->bindParam(':TelefoneVeterinario', $telefone);

  //EXECUTAR O $comando
  $comando->execute();

  if (!$comando) {
    die("Erro ao efetuar comando".$conexao->errorInfo());

    echo "Cadastro efetuado com sucesso!";
  }
  else {
    echo "Preencha o cadastro.";
  }



}
 ?>
