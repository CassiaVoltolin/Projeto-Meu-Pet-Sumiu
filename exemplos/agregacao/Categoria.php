<?php

class Categoria {
  public function __construct(
    private int $id_categoria = 0,
    private string $descritivo = "",
    private array $produtos = []
  ) {}

  public function getId_produto() {
    return $this->id_categoria;
  }
  public function getDescritivo() {
    return $this->descritivo;
  }
  public function getProdutos() {
    return $this->produtos;
  }
}

?>