<?php

require_once "cabecalho.php";

?>
	<div class="content">
		<div style="margin-bottom: 40px" class="container">
			<h1 style="margin-top: 60px; margin-bottom: 20px">Cadastro Pet</h1>
			<form class="row g-3" action="#" method="post" enctype="multipart/form-data">
				<div class="col-md-4">
					<label for="nome" class="form-label">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome">
				</div>
				<div class="col-md-4">
					<label for="idade" class="form-label">Idade</label>
					<input type="text" class="form-control" id="idade" name="idade">
				</div>
				<div class="col-md-4">
					<label for="raca" class="form-label">Raça</label>
					<input type="text" class="form-control" id="raca" name="raca">
				</div>
				<div class="col-md-4">
					<label for="porte">Porte</label>
					<select class="form-control" id="porte" name="porte">
						<option value="0">Escolha o porte do pet</option>
						<option>Mini</option>
					</option>
						<option>Pequeno</option>
						</option>
						<option>Médio</option>
						</option>
						<option>Grande</option>
					</select>
				</div>
				<div class="col-md-4">
					<label for="local">Local</label>
					<input type="text" class="form-control" id="local" name="local">
				</div>
				<div class="col-md-4">
					<label for="data">Data</label>
					<input type="date" class="form-control" id="data" name="data">
				</div>
				<!-- Mensagens de erro para Porte, Local e Data -->
				<div class="col-md-4 text-danger">
					<?php echo $msg[0]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[1]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[2]; ?>
        </div>
				
				<div class="col-md-4">
					<label for="cor">Cor</label>
					<input type="text" class="form-control" id="cor" name="cor">
				</div>
				<div class="col-md-4">
					<label for="cor_olhos">Cor dos Olhos</label>
					<input type="text" class="form-control" id="cor_olhos" name="cor_olhos">
				</div>
				<div class="col-md-4 px-3 d-flex justify-content-between align-items-center">
					<label for="situacao">Situação:</label>
					<div>
						<input type="radio" id="situacao1" name="situacao" value="Procurando o Pet">
						<label for="situacao1">Procurando o Pet</label>
					</div>
					<div>
						<input type="radio" id="situacao2" name="situacao" value="Procurando o Tutor">
						<label for="situacao2">Procurando o Tutor</label>
					</div>
				</div>
				<!-- Mensagens de erro para Cor, Cor dos Olhos e Situação -->
				<div class="col-md-4 text-danger">
					<?php echo $msg[3]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[4]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[5]; ?>
        </div>

				<div class="col-md-6">
					<label for="observacoes">Observações:</label>
					<textarea class="form-control" id="observacoes" rows="1" name="observacoes"></textarea>
				</div>
				<div class="col-md-6">
					<label for="imagem">Imagem:</label>
					<input class="form-control" type="file" id="imagem" name="imagem" onchange="mostrar(this)">
					<div class="mt-3 text-danger">
						<?php echo $msg[6]; ?>
					</div>
					<img class="" src="" id="img">
				</div>
				
				<div><button type="submit" class="btn btn-primary">Enviar</button></div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script>
		function mostrar(img) {
			if (img.files && img.files[0]) {
				const reader = new FileReader();
				reader.onload = (el) => {
					$('#img')
						.attr('src', el.target.result)
						.addClass('border border-3 border-info rounded')
						.width(270)
						.height(200);
				};
				reader.readAsDataURL(img.files[0]);
			}
		}
	</script>
</body>
</html>