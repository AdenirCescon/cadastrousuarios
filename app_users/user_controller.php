<?php
	//echo 'user controle privada <br>';
	require "connection.php";
	require "user_model.php";
	require "user_service.php";
	
	$actionUser = isset($_GET['actionUser']) ? $_GET['actionUser'] : $actionUser;

	//Ação para registrar um usuário no banco
	if($actionUser == 'readUser'){

		$connection = new ConnectionDB();
		$user = new User();
		$userService = new UserService($connection, $user);
		$users = $userService->readAllUsers();
	}
	//Ação para ler todos os usuários do banco
	else if($actionUser == 'insertUser'){

		echo '<h1>PROCEDIMENTO DE GRAVAÇÃO DE USUÁRIO</h1>';
		
		if ( !isset( $_POST['user'] ) || empty( $_POST ) ) {
			header("Location: /app_users/app_users_public?error=errorParam");
		}
		/*
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
		*/
	}
	else{

		//Por enquanto nada...
	}
	
?>