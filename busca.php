<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$lista_nome = [];

$sql = $pdo->query("SELECT id, nome FROM usuario WHERE nome LIKE '%".$nome."%'");

if($sql->rowCount() > 0){

	$lista_nome = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Resultado da busca de usuários</h1>
<br>
<table border="1">
	<tr>
		<th>ID</th>
		<th>NOME</th>
	</tr>
	<?php foreach($lista_nome as $usuario): ?>
	<tr>
		<td><?=$usuario['id'];?></td>
		<td><?=$usuario['nome'];?></td>
	</tr>
	<?php endforeach; ?>
</table>