<?php
require "connection.php";
require "user_model.php";
require "user_service.php";

$actionUser = isset($_GET['actionUser']) ? $_GET['actionUser'] : 'readAllUser';

//Ação para ler todos os usuários do banco
if ($actionUser == 'readAllUser') {

	$connection = new ConnectionDB();
	$user = new User();
	$userService = new UserService($connection, $user);
	$users = $userService->readAllUsers();
}

//Ação para buscar usuários do banco
else if ($actionUser == 'searchUsers') {


	$connection = new ConnectionDB();
	$user = new User();
	$user->__set('name', $_GET['name']);
	$userService = new UserService($connection, $user);
	$users = $userService->searchUsers();
}

//Ação para registrar um usuário no banco
else if ($actionUser == 'insertUser') {

	echo '<h1>PROCEDIMENTO DE GRAVAÇÃO DE USUÁRIO</h1>';

	if (!isset($_POST['user']) || empty($_POST)) {
		header("Location: /app_users/app_users_public?error=errorParam");
	}
} else {

	//Por enquanto nada...
}
