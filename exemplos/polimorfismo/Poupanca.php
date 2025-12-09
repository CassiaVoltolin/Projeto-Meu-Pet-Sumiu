<?php

class Poupanca extends Conta {
  public function __construct(
    private int $aniversario = 0,
    string $numero = "",
    string $agencia = "",
    float $saldo = 0
  ) {
    parent:: __construct($numero, $agencia, $saldo);
  }

  public function retirar($valor) {
    $diaCorrente = (int)date("d");
    
    if ($this->aniversario > $diaCorrente) {
      echo "<br>";
      echo "Você perderá os rendimentos de aniversário!";
    }

    if ($this->saldo >= $valor) {
      parent:: retirar($valor);
    }
    else {
      echo "<br>";
      echo "Conta poupança sem saldo suficiente!";
    }
  }
}

?>