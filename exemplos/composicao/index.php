<?php

require_once "Pessoa.php";
require_once "Telefone.php";

// Instanciando objeto Todo (Pessoa)
$pessoa1 = new Pessoa("Lucas Bardeli", 14, "998889090");
$pessoa1->setTelefone(14, "999999999");

// Instanciando objeto Parte (Telefone)
$pessoa2 = new Pessoa("João da Silva");
$telefone1 = new Telefone(11, "997727277", $pessoa2);

echo "<pre>";
var_dump($pessoa1);
echo "</pre><hr>";

echo "<pre>";
var_dump($telefone1);
echo "</pre>";

?>