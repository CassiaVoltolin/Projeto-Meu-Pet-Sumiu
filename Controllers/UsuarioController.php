<?php

require_once "Models/Conexao.php";
require_once "Models/UsuarioDAO.php";
require_once "Models/Usuarios.php";
require_once "config.php";

class UsuarioController
{
  public function login()
  {
    $msg = array("", "", "");
    $erro = false;

    if ($_POST) {
      // verificar os dados
      if (empty($_POST["email"])) {
        $msg[0] = "Preencha o email.";
        $erro = true;
      }
      if (empty($_POST["senha"])) {
        $msg[1] = "Preencha a senha.";
        $erro = true;
      }

      // verificar no banco de dados se existe esse usuário
      if (!$erro) {
        $usuario = new Usuarios(email: $_POST["email"]);
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->login($usuario);

        // verificar se a senha corresponde
        if (is_array($retorno)) {
          if (count($retorno) > 0) {
            if (password_verify($_POST["senha"], $retorno[0]->senha)) {
              // logado
              if (!isset($_SESSION)) {
                session_start();
              }
              $_SESSION["nome"] = $retorno[0]->nome;
              $_SESSION["id"] = $retorno[0]->id_usuario;
              $_SESSION["email"] = $retorno[0]->email;

              header("location:index.php");
            } else {
              $msg[2] = "Credenciais inválidas!";
            }
          } else {
            $msg[2] = "Credenciais inválidas!";
          }
        }
      }
    }
    // require views formulário
    require_once "Views/login.php";
  } // fim login

  public function inserir()
  {
    $msg = array("", "", "", "");
    $erro = false;

    if ($_POST) {
      if (empty($_POST["nome"])) {
        $msg[0] = "O campo nome é obrigatório.";
        $erro = true;
      }

      if (empty($_POST["email"])) {
        $msg[1] = "O campo email é obrigatório.";
        $erro = true;
      } else {
        // verificar se já não tem um usuário com esse email cadastrado
        $usuario = new Usuarios(email: $_POST["email"]);
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->valida_email($usuario);

        if (is_array($retorno)) {
          if (count($retorno) > 0) {
            $msg[1] = "Esse email já está cadastrado!";
            $erro = true;
          }
        }
      }

      if (empty($_POST["senha"])) {
        $msg[2] = "O campo senha é obrigatório.";
        $erro = true;
      }

      if (empty($_POST["telefone"])) {
        $msg[3] = "O campo telefone é obrigatório.";
        $erro = true;
      }

      if (!$erro) {
        $usuario = new Usuarios(0, $_POST["nome"], $_POST["email"], password_hash($_POST["senha"], PASSWORD_DEFAULT), $_POST["telefone"]);
        // cadastrar no banco de dados
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->inserir($usuario);
      }
    }

    require_once "Views/form-usuario.php";
  } // fim inserir

  public function logout()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    unset($_SESSION);
    session_destroy();
    header("location:index.php");
  } // fim logout

  public function esqueci_senha()
  {
    $msg = "";
    $link = "";
    $msg_email = "Será enviado um email para recuperação de senha";

    if ($_POST) {
      if (empty($_POST["email"])) {
        $msg = "Preencha o email!";
      } else {
        // verificar se é um email de algum usuário do sistema
        $usuario = new Usuarios(email: $_POST["email"]);
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->valida_email($usuario);

        if (is_array($retorno)) {
          if (count($retorno) > 0) {
            // enviar email
            $assunto = "Recuperação de senha - Meu Pet Sumiu.";
            $link = "http://localhost/meu-pet-sumiu/index.php?controle=UsuarioController&metodo=trocar_senha&id=" . base64_encode($retorno[0]->id_usuario);
            $nomeDestino = $retorno[0]->nome;
            $destino = $retorno[0]->email;
            $remetente = "lucasbbsjau@gmail.com";
            $nomeRemetente = "Meu Pet Sumiu";

            $mensagem = "
            <h2>Senhor(a) " . $nomeDestino . "</h2> <br> 
            <p>
              Recebemos a solicitação de recuperação de senha.
              Caso não tenha sido requerida por você, desconsidere essa mensagem.
              Caso contrário, clique no link abaixo para informar a nova senha
            </p>
            <a href='" . $link . "' target='_blank'>Clique aqui</a> <br><br> 
            <p>
              Atenciosamente<br>" . $nomeRemetente .
              "</p>";

            // $ret = sendMail($assunto, $mensagem, $remetente, $nomeRemetente, $destino, $nomeDestino);

            // if ($ret) {
            //   $msg_email = "Foi enviado um email de recuperação de senha. Verifique!";
            // }
            // else {
            //   $msg_email = "Erro no envio do email de recuperação. Tente mais tarde!";
            // }
          } else {
            $msg = "Verifique o email informado!";
          }
        } else {
          $msg = "Verifique o email informado!";
        }
      }
    }
    require_once "Views/form-email.php";
  } // fim esqueci_senha

  public function trocar_senha()
  {
    $msg = array("", "");
    $erro = false;

    if (isset($_GET["id"])) {
      $id = base64_decode($_GET["id"]);

      if ($_POST) {
        if (empty($_POST["senha"])) {
          $msg[0] = "Senha obrigatória!";
          $erro = true;
        }
        if (empty($_POST["confirmar-senha"])) {
          $msg[0] = "Confirme a senha!";
          $erro = true;
        }
        if (!$erro && $_POST["senha"] != $_POST["confirmar-senha"]) {
          $msg[1] = "As senhas não são iguais!";
          $erro = true;
        }
        if (!$erro) {
          // alterar senha no banco de dados
          $usuario = new Usuarios(id_usuario: $_POST["id_usuario"], senha: password_hash($_POST["senha"], PASSWORD_DEFAULT));
          $usuarioDAO = new UsuarioDAO();

          $retorno = $usuarioDAO->alterar_senha($usuario);

          header("location:index.php?controle=UsuarioController&metodo=login");
        }
      }

      require_once "Views/trocar-senha.php";
    }
  } // fim trocar_senha
}
// fim da classe
