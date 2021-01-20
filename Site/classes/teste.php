<?php

require_once('ProdutoCarrinho.php');
require_once('pedido.class.php');
require_once('EnderecoResidencial.php');
require_once('Address.php');
require_once('TipoProduto.php');
require_once('EnderecoParaEntrega.php');


// Primeira e segunda sobrescrita.

$tipoproduto = new TipoProduto("Planta");

$pedido = new Pedido("123", "Flor", 5.00, 4, $tipoproduto, 2);

echo $pedido->imprimir();


echo "<br><br>";

// Terceira sobrescrita.



$endereco = new EnderecoResidencial("Brasil", "Rua Raulino Demarch", "95", "-", "Rio do Sul", "SC", "casa", "na frente do bar");

echo $endereco->imprimir();

echo "<br><br>";

// Quarta sobrescrita.

$endereco1 = new EnderecoParaEntrega("Brasil", "Rua Raulino Demarch", "95", "-", "Rio do Sul", "SC", "apartamento", "Na rua", "19:00");

echo $endereco1->imprimir();

?>