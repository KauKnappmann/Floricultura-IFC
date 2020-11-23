<?php

require_once('Product.php');
require_once('TipoProduto.php');

$tipoProduto = new TipoProduto('Planta');

$meuProduto = new Product('Suculentinha', 20, 4, $tipoProduto);

echo $meuProduto->getTipoProduto()->getTipoProduto();


?>