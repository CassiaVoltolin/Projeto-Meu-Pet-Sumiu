<?php

class Produto {
  public function __construct(
    private int $id_produto = 0,
    private string $nome = "",
    private float $preco = 0,
    private array $categorias = []
  ) {}

  public function getId_produto() {
    return $this->id_produto;
  }
  public function getNome() {
    return $this->nome;
  }
  public function getPreco() {
    return $this->preco;
  }
  public function getCategorias() {
    return $this->categorias;
  }
}

?>