<?php

if (!isset($_SESSION)) {
  session_start();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Pet Sumiu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid px-5">
      <a class="navbar-brand fs-4" href="#">Meu Pet Sumiu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controle=PetController&metodo=listar">Lista de Pets Perdidos</a>
          </li>
          <?php if (isset($_SESSION["id"])): ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controle=PetController&metodo=inserir">Cadastrar Pets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controle=UsuarioController&metodo=logout">Sair</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controle=UsuarioController&metodo=inserir">Criar conta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controle=UsuarioController&metodo=login">Login</a>
            </li>
          <?php endif ?>

        </ul>
      </div>
    </div>
  </nav>