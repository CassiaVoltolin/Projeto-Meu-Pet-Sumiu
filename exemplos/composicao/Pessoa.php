<?php

class Pessoa {
  private array $telefone = [];
  
  public function __construct(
    private string $nome = "",
    int $ddd = 0,
    string $numero = ""
  ) {
    $this->telefone[] = new Telefone($ddd, $numero);
  }

  public function getNome(): string {
    return $this->nome;
  }

  public function setTelefone(int $ddd = 0, string $numero = ""): void {
    $this->telefone[] = new Telefone($ddd, $numero);
  }
}

?>