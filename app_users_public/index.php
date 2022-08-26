<?php

    //echo 'index publica<br>';
    $actionUser = "readUser";
    require  "user_controller.php";

    /*
    $lista_nome = [];
    $sql = $pdo->query("SELECT id, nome, email FROM usuario");
    if($sql->rowCount() > 0){

        $lista_nome = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    */
    include "views/header.html";
?>
    
<div class="row">

    
    <h1 class="h1">Sistema de cadastro de usuários</h1>
    <p>Clique em <a href=""><u>cadastrar</u></a> para criar um novo usuário</p>
    
    <h2>Buscar usuários</h2>
    
    <div class="col-md-6 mb-3">
        <form method="get" action="">

            <div class="form-group mb-2">
                <label for="username" class="form-label">Nome do usuário</label>
                <input class="form-control form-control-lg" type="text" name="name" id="username" placeholdedr="Ex: Adenir">
            </div>
            
            <input type="submit" value="Buscar" class="btn btn-primary">

        </form>
    </div>

    <h2>Usuários cadastrados</h2>
    <br>
    <p>Lista exibida apenas para mostrar quais usuários buscar!</p>
    <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
            </tr>
        <?php foreach($users as $indice => $user): ?>
        <tr>
            <td><?=$user->id;?></td>
            <td><?=$user->name;?></td>
            <td><?=$user->email;?></td>
        </tr>
        <?php endforeach; ?>
    </table>            
</div>

<?php
include "views/footer.html";
    



