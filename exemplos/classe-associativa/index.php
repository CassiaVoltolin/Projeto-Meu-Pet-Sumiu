<?php

require_once "Filme.php";
require_once "Ator.php";
require_once "Papel.php";

$filme = new Filme("Harry Potter e a Pedra Filosofal");
$ator = new Ator("Emma Watson");
$papel = new Papel("Hermione Granger", $filme, $ator);

echo "<pre>";
var_dump($papel);
echo "</pre>";

?>