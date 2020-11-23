<?php

require_once('ProdutoCarrinho.php');
require_once('TipoProduto.php');
require_once('Product.php');

$tipoProduto = new TipoProduto('Planta');

$meuProduto = new Produto('Suculentinha', 20, 4, $tipoProduto, 'uma suculentinha');

echo $meuProduto->getPedido()->getPedidos();

$meuProduto->addPedido($meuProduto);



?>