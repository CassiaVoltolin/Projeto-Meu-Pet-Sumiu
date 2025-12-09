<?php

final class Juridica extends Pessoa {
  public function __construct(
    private string $cnpj = "",
    string $nome = "",
    string $telefone = "",
    string $endereco = ""
  ) {
    parent:: __construct($nome, $telefone, $endereco);
  }

  public function getCNPJ() {
    return $this->cnpj;
  }

  public function setCNPJ($cnpj) {
    $this->cnpj = $cnpj;
  }

  public function validarCNPJ() {
    echo "Validar CNPJ";
  }
}

?>