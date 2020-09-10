<?php
//controle da interface
  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $formulario = file_get_contents('VetCadastro.html');

    if (isset($_GET['codUsuario'])) {
      //carregar dados para o formulario para edição

      require_once('conf/conf.inc.php');
      $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
      // var_dump($conexao);
      if (!$conexao)
        die("Erro ao conectar com o banco de dados..."); //morra, pare com a tudo aqui

        $sql = 'SELECT * FROM neTree WHERE codUsuario = :codUsuario';


        $comando = $conexao->prepare($sql); //stateman
        
        if (!$comando)
          die("Erro ao efetuar comando".$conexao->errorInfo());


        $comando->bindParam(':codUsuario', $_GET['codUsuario']);
        //executar o $comando

        $comando->execute();


        if (!$comando)
          die("Erro ao efetuar comando. Erro: ".$conexao->errorInfo());

          $veterinario = $comando->fetch(); //pegando os dados do Banco
          $formulario = str_replace('{nomeUsuario}', $veterinario['nomeUsuario'], $formulario);
          $formulario = str_replace('{CrmvVeterinario}', $veterinario['CrmvVeterinario'], $formulario);
          $formulario = str_replace('{TelefoneVeterinario}', $veterinario['TelefoneVeterinario'], $formulario);
          $formulario = str_replace('{codUsuario}', $veterinario['codUsuario'], $formulario);

    }else{

      $formulario = str_replace('{nomeUsuario}', '', $formulario);
      $formulario = str_replace('{CrmvVeterinario}', '', $formulario);
      $formulario = str_replace('{codUsuario}','', $formulario);
      $formulario = str_replace('{TelefoneVeterinario}', '', $formulario);
    }
    print($formulario);
  }
  elseif (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    //tratamento de dados para inserção
    if (isset($_POST['nomeUsuario'])) {
      // tratamento de dados para inserção
      $nome = $_POST['nomeUsuario'];
      $crmv = $_POST['CrmvVeterinario'];
      $telefone = $_POST['TelefoneVeterinario'];
      $codUsuario = $_POST['codUsuario'];

      if ($codUsuario > 0) {
        //atualização
        //salvar cadastro no Banco

        require_once('conf/conf.inc.php');
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

          if (!$conexao)
            die("Erro ao conectar com o banco de dados..."); //morra, pare com a tudo aqui

            $sql = 'UPDATE veterinario
                    SET nomeUsuario = :nomeUsuario, CrmvVeterinario = :CrmvVeterinario, TelefoneVeterinario = :TelefoneVeterinario
                    WHERE codUsuario = :codUsuario';

          //prepara o comando para EXECUTAR

          $comando = $conexao->prepare($sql);

          if (!$comando)
            die("Erro ao criar o comando. Erro: ".$conexao->errorInfo());

          //vincular variáveis com os parâmetros do $comando
          $comando->bindParam(':nomeUsuario', $nome);
          $comando->bindParam(':CrmvVeterinario', $crmv);
          $comando->bindParam(':TelefoneVeterinario', $telefone);
          $comando->bindParam(':codUsuario', $codUsuario);

          //executar o $comando

          $comando->execute();

          if (!$comando)
            die("Erro ao criar o comando. Erro: ".$conexao->errorInfo());

            echo "Cadastro atualizado com sucesso!";
        }
      else {
        //salvar cadastro no Banco
        require_once('conf/conf.inc.php');
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        if (!$conexao)
          die("Erro ao conectar com o banco de dados...");

        //definir o comando que será executado no banco de Dados

        $sql = 'INSERT INTO Veterinario (nomeUsuario, CrmvVeterinario, TelefoneVeterinario)
                VALUES (:nomeUsuario, :CrmvVeterinario, :TelefoneVeterinario)';

        //PREPARA O COMANDO PARA executar

          $comando = $conexao->prepare($sql);

          if (!$comando)
            die("Erro ao criar o comando. Erro: ".$conexao->errorInfo());

            //vincular variaveis com os parametros do comando
            $comando->bindParam(':nomeUsuario', $nome);
            $comando->bindParam(':CrmvVeterinario', $crmv);
            $comando->bindParam(':TelefoneVeterinario', $telefone);
            //executar o COMANDO

            $comando->execute();

            if (!$comando)
              die("Erro ao criar o comando. Erro: ".$conexao->errorInfo());

              echo "Cadastro efetuado com sucesso!";
      }
    }
    else {
      echo "Preencha todos os campos do formulário";
    }
  }
 ?>
