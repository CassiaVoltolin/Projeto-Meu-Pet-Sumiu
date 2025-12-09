
CREATE DATABASE IF NOT EXISTS meu_pet_sumiu CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE meu_pet_sumiu;

DROP TABLE IF EXISTS pets;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
  id_usuario BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(15) NOT NULL
);

CREATE TABLE pets (
  id_pet BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usuario_id BIGINT UNSIGNED NOT NULL,
  nome VARCHAR(255),
  idade VARCHAR(255),
  porte ENUM('Mini','Pequeno','Médio','Grande') NOT NULL,
  raca VARCHAR(255),
  local VARCHAR(255) NOT NULL,
  data DATE NOT NULL,
  imagem VARCHAR(255) NOT NULL,
  cor VARCHAR(255) NOT NULL,
  cor_olhos VARCHAR(255) NOT NULL,
  situacao VARCHAR(255) NOT NULL,
  observacoes TEXT,

  FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario)
);

COMMIT;