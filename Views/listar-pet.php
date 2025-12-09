<?php

require_once "cabecalho.php";


?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Lista de Pets Perdidos</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php
        if (count($pets) == 0) {
            echo "Nenhum pet cadastrado";
        }
        foreach ($pets as $pet) {
        ?>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header d-flex gap-2 align-items-center">
                        <?= $pet->nome ?> <span class="badge 
                        <?= $pet->situacao === "Procurando o Pet" ? "text-bg-success" : "text-bg-info" ?> text-white">
                            <?= $pet->situacao ?>
                        </span>
                    </div>
                    <div class="card-body">
                        <img src="assets/<?= $pet->imagem ?>" class="card-img-top img-fluid" alt="...">
                        <br>
                        <?= $pet->observacoes ?>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="index.php?controle=PetController&metodo=gerar_cartaz&id=<?= $pet->id_pet ?>">Gerar Cartaz</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>