<?php

// "abstract" não permite instanciar a classe Pessoa
abstract class Pessoa {
  public function __construct(
    protected string $nome = "", 
    protected string $telefone = "", 
    protected string $endereco = ""
  ) {}

  public function getNome() {
    return $this->nome;
  }

  public function getTelefone() {
    return $this->telefone;
  }

  public function getEndereco() {
    return $this->endereco;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function setTelefone($telefone) {
    $this->telefone = $telefone;
  }

  public function setEndereco($endereco) {
    $this->endereco = $endereco;
  }

  public function inserir($pessoa) {
    echo "Inserir";
  }
  
  public function alterar($pessoa) {
    echo "Alterar";
  }
}

?>