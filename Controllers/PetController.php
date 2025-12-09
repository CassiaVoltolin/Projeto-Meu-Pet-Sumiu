<?php

use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

if (!isset($_SESSION)) {
  session_start();
}

require_once "Models/Conexao.php";
require_once "Models/Usuarios.php";
require_once "Models/PetDAO.php";
require_once "Models/Pets.php";

class PetController
{
  public function inserir()
  {
    $msg = array("", "", "", "", "", "", "");

    if ($_POST) {
      $erro = false;

      if ($_POST["porte"] == 0) {
        $msg[0] = "Preencha o porte do pet";
        $erro = true;
      }
      if (empty($_POST["local"])) {
        $msg[1] = "Preencha onde o pet foi encontrado ou perdido";
        $erro = true;
      }
      if (empty($_POST["data"])) {
        $msg[2] = "Preencha a data em que o pet foi encontrado ou perdido";
        $erro = true;
      }
      if (empty($_POST["cor"])) {
        $msg[3] = "Preencha as cores do pet";
        $erro = true;
      }
      if (empty($_POST["cor_olhos"])) {
        $msg[4] = "Preencha a cor dos olhos do pet";
        $erro = true;
      }
      if (!isset($_POST["situacao"])) {
        $msg[5] = "Informe a situação do pet";
        $erro = true;
      }
      if ($_FILES["imagem"]["name"] == "") {
        $msg[6] = "Selecione a imagem do pet";
        $erro = true;
      } else {
        if (
          $_FILES["imagem"]["type"] != "image/png" &&
          $_FILES["imagem"]["type"] != "image/jpg" &&
          $_FILES["imagem"]["type"] != "image/jpeg"
        ) {
          $msg[6] = "Tipo de imagem inválido";
          $erro = true;
        }
      }

      if (!$erro) {
        // inserir no BD - instanciar os objetos
        $usuario = new Usuarios($_SESSION["id"]);

        $pet = new Pets(
          id_pet: 0,
          imagem: $_FILES["imagem"]["name"],
          nome: $_POST["nome"],
          idade: $_POST["idade"],
          raca: $_POST["raca"],
          local: $_POST["local"],
          data: $_POST["data"],
          cor: $_POST["cor"],
          porte: $_POST["porte"],
          cor_olhos: $_POST["cor_olhos"],
          situacao: $_POST["situacao"],
          observacoes: $_POST["observacoes"],
          usuario: $usuario
        );
        $petDAO = new petDAO();

        $petDAO->inserir($pet);


        // fazer upload da imagem
        // Verifica se a pasta existe
        if (!is_dir("assets/")) {
          // Cria a pasta com permissão 0755 (leitura e execução para todos, escrita só para o dono)
          mkdir("assets/", 0755, true);
        }
        $caminho = "assets/" . $_FILES["imagem"]["name"];
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho);

        header("location:index.php");
        die();
      }
    } // fim if post

    require_once "Views/form-pet.php";
  }

  public function alterar() {}
  public function mudar_situacao() {}
  public function listar()
  {
    $petDAO = new petDAO();

    $pets = $petDAO->listar($_SESSION["id"] ?? null);
    require_once "Views/listar-pet.php";
  }

  public function gerar_cartaz()
  {
    if (!isset($_GET['id'])) {
      throw new \Exception("Id do pet nao informado");
    }

    $petDAO = new petDAO();
    $pet = $petDAO->buscar($_GET['id']);

    $css = "
body {
    font-family: 'DejaVu Sans';
    color: #333;
    background: #f8f8f8;
}

.cartaz {
    width: 100%;
    padding: 25px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.08);
}

.titulo {
    font-size: 40px;
    font-weight: 900;
    text-align: center;
    letter-spacing: 3px;
    color: #d9534f;
    margin-bottom: 20px;
}

.imagem {
    margin: 15px 0;
    text-align: center;
}

.imagem img {
    border-radius: 10px;
    border: 5px solid #eee;
}

.bloco-info {
    font-size: 16px;
    line-height: 1.6;
    margin-top: 20px;
    padding: 15px;
    background: #fafafa;
    border-radius: 8px;
}

.bloco-info p {
    margin: 6px 0;
}

.bloco-info b {
    font-size: 18px;
    color: #333;
}
";


    $html = "
<div class='cartaz'>
    <div class='titulo'>PROCURA-SE</div>

    <div class='imagem'>
        <img src='assets/{$pet->imagem}' width='260'>
    </div>

    <div class='bloco-info'>
        <p><b>Nome:</b> {$pet->nome}</p>
        <p><b>Idade:</b> {$pet->idade}</p>
        <p><b>Porte:</b> {$pet->porte}</p>
        <p><b>Raça:</b> {$pet->raca}</p>
        <p><b>Último local visto:</b> {$pet->local}</p>
        <p><b>Data:</b> {$pet->data}</p>
        <p><b>Cor:</b> {$pet->cor}</p>
        <p><b>Cor dos olhos:</b> {$pet->cor_olhos}</p>
        <p><b>Situação:</b> {$pet->situacao}</p>
        <p><b>Observações:</b> {$pet->observacoes}</p>
    </div>
</div>
";


    $mpdf = new Mpdf([
      'tempDir' => __DIR__ . '/temp',
      'mode' => 'utf-8',
      'format' => 'A4',
      'default_font' => 'DejaVuSans'
    ]);

    $mpdf->showImageErrors = true;

    $mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);

    $mpdf->Output(urlencode($pet->nome) . ".pdf", Destination::DOWNLOAD);
  }
}
