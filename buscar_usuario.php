<?php
/**
 *
 * Template Name: Cesc Buscar
 *
 */
require 'config.php';
$lista_nome = [];
if($_GET){
    $nome = $_GET['nome'];
    
    $sql = $pdo->query("SELECT id, nome, email FROM usuario WHERE nome LIKE '%".$nome."%'");

    if($sql->rowCount() > 0){

        $lista_nome = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
get_header();?>
    
    <section class="rh_wrap rh_wrap--padding">
        <div class="rh_page">

            <h1>Sistema de cadastro de usuários</h1>
            <p>Clique em <a href="/cesc">home</a> para voltar a página principal</p>

            <h2>Resultado da busca de usuários</h2>
            <br>
            <?php 
                if(!$_GET){
                    echo "<h3>Não foram passados parêmentros, busque novamente!</h3>";
                };
            ?>
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

            <h2>Nova Busca</h2>
            <form method="get" action="">
                <br>
                <label>
                    Nome do usuário: <br> <input type="text" name="nome" style="border:2px solid; border-radius: 4px; width: 50%; height: 40px;">
                </label>
                <input type="submit" value="Buscar" style="border:2px solid #1ea69a; border-radius: 4px; width: 150px; height: 40px; background-color: #1ea69a; color: white; cursor: pointer;">
            </form>

        </div><!-- /.rh_page rh_page__main -->
    </section><!-- /.rh_section rh_wrap rh_wrap--padding -->
<?php
get_footer();