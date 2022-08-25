<?php
require  'config.php';
$lista_nome = [];

$sql = $pdo->query("SELECT id, nome, email FROM usuario");

if($sql->rowCount() > 0){

    $lista_nome = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
    

<div class="">

    <h1 class="h1">Sistema de cadastro de usuários</h1>
    <p>Clique em <a href="/cesc/cad2/cadastrar_usuario.php"><u>cadastrar</u></a> para criar um novo usuário</p>

    
    <h2>Buscar usuários</h2>
    <form method="get" action="/cesc/buscar">
        <br>
        <label>
            Nome do usuário<br> <input type="text" name="nome" style="border:2px solid; border-radius: 4px; width: 50%; height: 40px;">
        </label>
        <input type="submit" value="Buscar" style="border:2px solid #1ea69a; border-radius: 4px; width: 150px; height: 40px; background-color: #1ea69a; color: white; cursor: pointer;">
    </form>

    <h2>Usuários cadastrados</h2>
    <br>
    <p>Lista exibida apenas para mostrar quais usuários buscar!</p>
    <table class="table table-hover" border="1">
        <tr>
            <th scope="col">ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
        </tr>
        <?php foreach($lista_nome as $usuario): ?>
        <tr>
            <td style="word-wrap: break-word;"><?=$usuario['id'];?></td>
            <td style="word-wrap: break-word;"><?=$usuario['nome'];?></td>
            <td style="word-wrap: break-word;"><?=$usuario['email'];?></td>
        </tr>
        <?php endforeach; ?>
    </table>            
</div>

