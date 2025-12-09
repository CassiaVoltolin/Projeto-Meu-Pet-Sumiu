<?php

abstract class Conta {
  public function __construct(
    protected string $numero = "",
    protected string $agencia = "",
    protected float $saldo = 0
  ) {}

  public function getSaldo() {
    return $this->saldo;
  }

  public function retirar($valor) {
    if ($valor > 0) {
      $this->saldo -= $valor;
    }
  }
}

?>