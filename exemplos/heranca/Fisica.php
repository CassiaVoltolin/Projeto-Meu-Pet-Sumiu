<?php

// "final" não permite elas terem filhas
final class Fisica extends Pessoa {
  public function __construct(
    private string $cpf = "",
    string $nome = "",
    string $telefone = "",
    string $endereco = ""
  ) {
    parent:: __construct($nome, $telefone, $endereco);
  }

  public function getCPF() {
    return $this->cpf;
  }

  public function setCPF($cpf) {
    $this->cpf = $cpf;
  }

  public function validarCPF() {
    echo "Validar CPF";
  }
}

?>