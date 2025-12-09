<?php

require_once "Pessoa.php";
require_once "Fisica.php";
require_once "Juridica.php";

$pessoa_fisica = new Fisica("111.111.111-11", "João da Silva", "(14)99999-9999", "Rua da Fé, 123, 17000000");
$pessoa_juridica = new Juridica("11.111.111/0001-99", "João da Silva", "(14)99999-9999", "Rua da Fé, 123, 17000000");

echo "<pre>";
var_dump($pessoa_fisica);
echo "<br>";
var_dump($pessoa_juridica);
echo "</pre>";

echo $pessoa_fisica->inserir($pessoa_fisica);
echo "<br>";
echo $pessoa_fisica->alterar($pessoa_fisica);

$pessoa = new Pessoa("Lucas", "14999999999", "Rua tal");

?>