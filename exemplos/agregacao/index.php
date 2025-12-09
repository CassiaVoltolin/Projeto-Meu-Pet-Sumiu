<?php

require_once "Produto.php";
require_once "Categoria.php";

$categoria1 = new Categoria(1, "Material Escolar");
$categoria2 = new Categoria(2, "Material de Escritório");

$produto1 = new Produto(1, "Caneta", 3.69, array($categoria1, $categoria2));

echo "<h2>Produto - {$produto1->getNome()}</h2>";
echo "<p>Preço: R$ " . number_format($produto1->getPreco(), 2, ",", ".") . "</p>";
echo "<h3>Categoria(s)</h3>";
foreach($produto1->getCategorias() as $dado) {
  echo "Descritivo: {$dado->getDescritivo()}<br>";
}

?>