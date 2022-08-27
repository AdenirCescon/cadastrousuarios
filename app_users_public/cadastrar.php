<?php

require  "user_controller.php";
include "views/header.html";
?>

<div class="container">
    <div class="row mt-4">

        <div class="col-md-12">
            <h1 class="mb-5">Sistema de cadastro de usuários</h1>
            <form action="/app_users/app_users_public/user_controller.php?actionUser=insertUser" method="post">
                <div class="mb-3">
                    <label for="nameinput" class="form-label">Nome Completo</label>
                    <input autofocus type="text" class="form-control" name="namei" id="nameinput">
                </div>
                <div class="mb-3">
                    <label for="emailinput" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="emaili" id="emailinput">
                </div>
                <div class="mb-3">
                    <label for="passinput" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="passi" id="passinput">
                </div>
                <p><span class="mb-3"> <?php echo (isset($_GET['status']) && $_GET['status'] == 'success' ? '<span class="text-success">Usuário cadastrado com sucesso!</span>' : ''); ?> </span></p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <div class="col-md-12 mt-5">
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
