<?php
require "connection.php";
require "user_model.php";
require "user_service.php";

$actionUser = isset($_GET['actionUser']) ? $_GET['actionUser'] : 'readAllUser';
$actionUser = isset($_GET['name']) ? 'searchUsers' : $actionUser;

//Ação para ler todos os usuários do banco
if ($actionUser == 'readAllUser') {

	$connection = new ConnectionDB();
	$user = new User();
	$userService = new UserService($connection, $user);
	$users = $userService->readAllUsers();
}

//Ação para buscar usuários do banco
else if ($actionUser == 'searchUsers') {

	if (isset($_GET['name'])) {

		$connection = new ConnectionDB();
		$user = new User();
		$user->__set('name', $_GET['name']);
		$userService = new UserService($connection, $user);
		$users = $userService->searchUsers();
	} else {
		header("Location: /app_users/app_users_public?status=errorNoUserfound");
	}
}

//Ação para registrar um usuário no banco
else if ($actionUser == 'insertUser') {

	if (!isset($_POST['namei']) || empty($_POST['namei'])) {

		header("Location: /app_users/app_users_public/cadastrar.php?status=errorName");
	} else if (!isset($_POST['emaili']) || !filter_var($_POST['emaili'], FILTER_VALIDATE_EMAIL)) {

		header("Location: /app_users/app_users_public/cadastrar.php?status=errorEmail");
	} else if (!isset($_POST['passi']) || empty($_POST['passi'])) {

		header("Location: /app_users/app_users_public/cadastrar.php?status=errorPass");
	} else {

		$connection = new ConnectionDB();
		$user = new User();
		$user->__set('name', $_POST['namei']);
		$user->__set('pass', $_POST['passi']);
		$user->__set('email', $_POST['emaili']);
		$userService = new UserService($connection, $user);
		$userService->registerUser();
		header("Location: /app_users/app_users_public/cadastrar.php?status=success");
	}


	//echo '<h1>PROCEDIMENTO DE GRAVAÇÃO DE USUÁRIO</h1>';
	//print_r($_POST);
	/*
	if (!isset($_POST['user']) || empty($_POST)) {
		header("Location: /app_users/app_users_public?error=errorParam");
	}
	*/
} else {

	//Por enquanto nada...
}
