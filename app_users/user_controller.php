<?php
require "connection.php";
require "user_model.php";
require "user_service.php";

$actionUser = isset($_GET['actionUser']) ? $_GET['actionUser'] : 'readAllUser';
$actionUser = isset($_GET['name']) ? 'searchUsers' : $actionUser;


if ($actionUser == 'readAllUser') {
	//Ação para ler todos os usuários do banco
	$connection = new ConnectionDB();
	$user = new User();
	$userService = new UserService($connection, $user);
	$users = $userService->readAllUsers();
} else if ($actionUser == 'searchUsers') {
	//Ação para buscar usuários do banco
	if (isset($_GET['name'])) {

		$connection = new ConnectionDB();
		$user = new User();
		$user->__set('name', $_GET['name']);
		$userService = new UserService($connection, $user);
		$users = $userService->searchUsers();
	} else {
		header("Location: /app_users/app_users_public?status=errorNoUserfound");
	}
} else if ($actionUser == 'insertUser') {
	//Ação para registrar um usuário no banco
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
} else {

	//Por enquanto nada...
}
