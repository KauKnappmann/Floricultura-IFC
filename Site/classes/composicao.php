<?php

require_once('ProdutoCarrinho.php');
require_once('TipoProduto.php');
require_once('Product.php');

$tipoProduto = new TipoProduto('Planta');

$meuProduto = new ProdutoCarrinho('Suculentinha', 20, 4, $tipoProduto, 'uma suculentinha');

$meuProduto->addPedidos('cacto');

foreach($meuProduto->getPedidos() as $pedido){
    echo $pedido->getPedido();
    echo "<br>";
}

?>