<?php

require_once('ProdutoCarrinho.php');
require_once('pedido.class.php');
require_once('EnderecoResidencial.php');
require_once('Address.php');
require_once('TipoProduto.php');
require_once('EnderecoParaEntrega.php');

$tipoproduto = new TipoProduto("Planta");

$pedido = new Pedido("123", "Flor", "R$5,00", "4", $tipoproduto);

echo $pedido->imprimir();




$endereco = new Address("Brasil", "Rua Raulino Demarch", "95", "-", "Rio do Sul", "SC");

echo $endereco->imprimir();

?>