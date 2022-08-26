<?php

require 'config.php';

$errocesc = '';

if($_GET){
    
    if(isset($_GET['errocesc'])){
        $errocesc = $_GET['errocesc'];
    }
    
}


$lista_nome = [];
$sql = $pdo->query("SELECT id, nome, email FROM usuario");
if($sql->rowCount() > 0){

    $lista_nome = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div>

    <h1>Sistema de cadastro de usuários</h1>
    <p>Clique em <a href="/cesc">home</a> para voltar a página principal</p>

    <h2>Cadastrar usuários</h2>
    <br>

    <form method="post" action="/cesc/wp-content/themes/realhomes/cadastro.php">
        <label>
            Nome: <br><input type="text" name="nome" placeholder="Informe seu nome" style="border:2px solid; border-radius: 4px; width: 66%; height: 40px;">
        </label>
        <br><br>
        <label>
             E-mail: <br> <input type="email" name="email" placeholder="Informe seu e-mail" style="border:2px solid; border-radius: 4px; width: 66%; height: 40px;">
        </label>
        <br><br>
        <label>
            Senha: <br><input type="password" name="senha" placeholder="Informe sua senha" style="border:2px solid; border-radius: 4px; width: 66%; height: 40px;">
        </label>
        <br>
        <br>
        <input type="submit" value="Cadastrar" style="border:2px solid #1ea69a; border-radius: 4px; width: 66%; height: 50px; background-color: #1ea69a; color: white; cursor: pointer;">
        <hr>
    </form>
    <br>
    <?php 
        
        if($errocesc == ''){
            //nada
        }
        else if($errocesc == 'nome'){
            echo "<p style='color: red;'>O campo <strong>". $errocesc . "</strong> está vazio ou incorreto, verifique e tente novamente!</p>";
        } 
        else if($errocesc == 'email'){
            echo "<p style='color: red;'>O campo <strong>". $errocesc . "</strong> está vazio ou incorreto, verifique e tente novamente!</p>";
        } 
        else if($errocesc == 'senha'){
            echo "<p style='color: red;'>O campo <strong>". $errocesc . "</strong> está vazio ou incorreto, verifique e tente novamente!</p>";
        } else{
            //nada
        } 
    ?>

    <br>
    <br>

    <h2>Usuários cadastrados</h2>
        <br>
        <p>Lista de usuários já cadastrados!</p>
        <table border="1">
            <tr>
                <th>ID</th>
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
