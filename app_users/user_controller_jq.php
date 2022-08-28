<?php
require "connection.php";
require "user_model.php";
require "user_service.php";

if ($_GET['actionUser'] == 'searchAllUsers') {

    $connection = new ConnectionDB();
    $user = new User();
    $userService = new UserService($connection, $user);
    $users = $userService->readAllUsers();
} else if ($_GET['actionUser'] == 'searchTermName' && isset($_GET['name'])) {

    $connection = new ConnectionDB();
    $user = new User();
    $user->__set('name', $_GET['name']);
    $userService = new UserService($connection, $user);
    $users = $userService->searchUsers();
}

echo json_encode($users);
