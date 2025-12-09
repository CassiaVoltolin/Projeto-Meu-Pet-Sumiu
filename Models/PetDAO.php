<?php

class PetDAO extends Conexao
{
  public function __construct()
  {
    parent::__construct();
  }

  public function buscar($pet_id)
  {
    try {
      $sql = "SELECT * FROM pets WHERE id_pet = ?";
      $stm = $this->db->prepare($sql);
      $stm->bindValue(1, $pet_id);
      $stm->execute();
      $this->db = null;
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      $this->db = null;
      return "Erro ao buscar pet: " . $e->getMessage();
    }
  }

  public function inserir($pet)
  {

    $sql = "INSERT INTO pets (usuario_id,nome,idade,porte,raca,local,data,imagem,cor,cor_olhos,situacao,observacoes)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

    try {
      $stm = $this->db->prepare($sql);
      $stm->bindValue(1, $pet->getUsuario()->getId_usuario());
      $stm->bindValue(2, $pet->getNome());
      $stm->bindValue(3, $pet->getIdade());
      $stm->bindValue(4, $pet->getPorte());
      $stm->bindValue(5, $pet->getRaca());
      $stm->bindValue(6, $pet->getLocal());
      $stm->bindValue(7, $pet->getData());
      $stm->bindValue(8, $pet->getImagem());
      $stm->bindValue(9, $pet->getCor());
      $stm->bindValue(10, $pet->getCor_olhos());
      $stm->bindValue(11, $pet->getSituacao());
      $stm->bindValue(12, $pet->getObservacoes());

      $stm->execute();
      $this->db = null;
      return "Pet inserido com sucesso!";
    } catch (PDOException $e) {
      $this->db = null;
      return "Erro ao inserir Pet: " . $e->getMessage();
    }
  }


  public function listar($id_usuario = null)
  {
    try {
      $sql = "SELECT * FROM pets";

      if ($id_usuario != null) {
        $stm = $this->db->prepare($sql . " WHERE usuario_id = ?");
        $stm->bindValue(1, $id_usuario);
      }

      if ($id_usuario == null) {
        $stm = $this->db->prepare($sql);
      }

      $stm->execute();
      $this->db = null;

      echo $id_usuario;

      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      $this->db = null;
      return "Erro ao listar pets";
    }
  }
}
