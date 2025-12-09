<?php

class Usuarios {
  public function __construct(
    private int $id_usuario = 0,
    private string $nome = "",
    private string $email = "",
    private string $senha = "",
    private string $telefone = ""
  ) {}

  // Encapsulamento
  public function getId_usuario() {
    return $this->id_usuario;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getSenha() {
    return $this->senha;
  }

  public function getTelefone() {
    return $this->telefone;
  }

  public function setId_usuario($id_usuario) {
    return $this->id_usuario =  $id_usuario;
  }

  public function setNome($nome) {
    return $this->nome =  $nome;
  }

  public function setEmail($email) {
    return $this->email =  $email;
  }

  public function setSenha($senha) {
    return $this->senha =  $senha;
  }

  public function setTelefone($telefone) {
    return $this->telefone =  $telefone;
  }
}

?>