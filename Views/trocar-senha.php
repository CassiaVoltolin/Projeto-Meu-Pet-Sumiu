<?php

require_once "cabecalho.php"

?>
  <div class="content">
    <div class="container">
      <h1 style="margin-top: 60px; margin-bottom: 20px">Redefinir Senha</h1>
      <form class="row g-3" action="#" method="post">
        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $id; ?>">
        <div class="col-md-6">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <div class="col-md-6">
          <label for="confirmar-senha" class="form-label">Confirmar Senha</label>
          <input type="password" class="form-control" id="confirmar-senha" name="confirmar-senha">
        </div>
        <div class="col-md-6 text-danger">
          <?= $msg[0]; ?>
        </div>
        <div class="col-md-6 text-danger">
          <?= $msg[1]; ?>
        </div>
        <div class="d-flex align-items-center gap-4">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>