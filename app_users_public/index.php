<?php

$actionUser = "readAllUser";
require  "user_controller.php";
include "views/header.html";
?>
<div class="container">
    <div class="row mt-4">

        <div class="col-md-12">
            <h1 class="mb-5">Sistema de cadastro de usuários</h1>
            <h3> <?php echo (isset($_GET['name']) ? count($users) . ' usuários encontrados para a busca: ' . '<span class="text-warning fw-bold">' . $_GET['name'] . '</span>' : count($users) . ' usuários cadastrados no total!'); ?> </h3>
            <p>Lista exibida apenas para mostrar quais usuários buscar!</p>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $indice => $user) : ?>
                        <tr>
                            <td><?= $user->id; ?></td>
                            <td><?= $user->name; ?></td>
                            <td><?= $user->email; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php
include "views/footer.html";
