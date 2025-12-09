<?php

class Papel {
  public function __construct(
    private string $descritivo = "",
    private Filme $filme = new Filme(),
    private Ator $ator = new Ator(),
  ) {}

  public function getDescritivo(): string {
    return $this->descritivo;
  }
  public function getFilme(): Filme {
    return $this->filme;
  }
  public function getAtor(): Ator {
    return $this->ator;
  }
}

?>