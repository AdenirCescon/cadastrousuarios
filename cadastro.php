<?php

require 'config.php';

if ( !isset( $_POST ) || empty( $_POST ) ) {
	header("Location: /cesc/cadastrar-usuario?error=1");
}
else{

	$nome = filter_input(INPUT_POST, 'nome');
	$email = filter_input(INPUT_POST, 'email');
	$senha = filter_input(INPUT_POST, 'senha');	

	if(!isset($nome) || empty($nome)){
		header("Location: /cesc/cadastrar-usuario?errocesc=nome");
	}
	else if((!isset($email) || empty($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: /cesc/cadastrar-usuario?errocesc=email");
	}
	else if(!isset($senha)|| empty($senha)){
		header("Location: /cesc/cadastrar-usuario?errocesc=senha");
	}
	else{
		
		$sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");

		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->execute();

		header("Location: /cesc/cadastrar-usuario");
		}
}
