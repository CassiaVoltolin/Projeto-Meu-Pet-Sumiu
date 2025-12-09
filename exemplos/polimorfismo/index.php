<?php

require_once "Conta.php";
require_once "Corrente.php";
require_once "Poupanca.php";

$conta_corrente = new Corrente(1000, "123-4", "234-5", 5000);

echo $conta_corrente->getSaldo();
$conta_corrente->retirar(11000);
echo "<br>";
echo $conta_corrente->getSaldo();

$conta_poupanca = new Poupanca(4, "123-4", "234-5", 10000);

echo "<br>";
echo $conta_poupanca->getSaldo();
$conta_poupanca->retirar(11000);
echo "<br>";
echo $conta_poupanca->getSaldo();

?>