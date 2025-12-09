<?php

class Pets {
  public function __construct(
    private int $id_pet = 0,
    private string $nome = "",
    private string $idade = "",
    private string $porte = "",
    private string $raca = "",
    private string $local = "",
    private string $data = "",
    private string $imagem = "",
    private string $cor = "",
    private string $cor_olhos = "",
    private string $situacao = "",
    private string $observacoes = "",
    private Usuarios $usuario = new Usuarios()
  ) {}

  // métodos get
  public function getId_pet() {
    return $this->id_pet;
  }
  public function getNome() {
    return $this->nome;
  }
  public function getIdade() {
    return $this->idade;
  }
  public function getPorte() {
    return $this->porte;
  }
  public function getRaca() {
    return $this->raca;
  }
  public function getLocal() {
    return $this->local;
  }
  public function getData() {
    return $this->data;
  }
  public function getImagem() {
    return $this->imagem;
  }
  public function getCor() {
    return $this->cor;
  }
  public function getCor_olhos() {
    return $this->cor_olhos;
  }
  public function getObservacoes() {
    return $this->observacoes;
  }
  public function getSituacao() {
    return $this->situacao;
  }
  public function getUsuario() {
    return $this->usuario;
  }

  // métodos set
  public function setId_pet($id_pet) {
    return $this->id_pet = $id_pet;
  }
  public function setNome($nome) {
    return $this->nome = $nome;
  }
  public function setIdade($idade) {
    return $this->idade = $idade;
  }
  public function setPorte($porte) {
    return $this->porte = $porte;
  }
  public function setRaca($raca) {
    return $this->raca = $raca;
  }
  public function setData($data) {
    return $this->data = $data;
  }
  public function setImagem($imagem) {
    return $this->imagem = $imagem;
  }
  public function setCor($cor) {
    return $this->cor = $cor;
  }
  public function setCor_olhos($cor_olhos) {
    return $this->cor_olhos = $cor_olhos;
  }
  public function setObservacoes($observacoes) {
    return $this->observacoes = $observacoes;
  }
  public function setSituacao($situacao) {
    return $this->situacao = $situacao;
  }
}

?>