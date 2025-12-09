<?php

abstract class Conexao {
  public function __construct(
    protected $db = null
  ) {
    
    $db_user = $_ENV["DB_USER"];
    $db_password = $_ENV["DB_PASSWORD"];
    $db_host = $_ENV["DB_HOST"];
    $db_name = $_ENV["DB_NAME"];

    $parametros = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

    try {
      $this->db = new PDO($parametros, $db_user, $db_password);
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      echo $e->getCode();
      die("Erro na conexão com o banco");
    }
  }
}

?>