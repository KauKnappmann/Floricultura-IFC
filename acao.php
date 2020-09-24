<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $codigo = isset($_GET['codPlanta']) ? $_GET['codPlanta'] : 0;
        excluir($codigo);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $codigo = isset($_POST['codPlanta']) ? $_POST['codPlanta'] : "";
        if ($codigo == 0)
            inserir($codigo);
        else
            editar($codigo);
    }
      // Busca um item pelo código no BD
      function buscarDados($codigo){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM plantas WHERE codPlanta = $codigo");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['codPlanta'] = $linha['codPlanta'];
            $dados['nomePlanta'] = $linha['nomePlanta'];
        }
        return $dados;
    }