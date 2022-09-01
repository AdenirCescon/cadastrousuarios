<?php
require "connection.php";
require "user_model.php";
require "user_service.php";

if (isset($_GET['actionUser']) && $_GET['actionUser'] == 'searchAllUsers') {

    $connection = new ConnectionDB();
    $user = new User();
    $userService = new UserService($connection, $user);
    $users = $userService->readAllUsers();
    echo json_encode($users);
} else if (isset($_GET['actionUser']) &&  $_GET['actionUser'] == 'searchTermName' && isset($_GET['name'])) {

    $connection = new ConnectionDB();
    $user = new User();
    $user->__set('name', $_GET['name']);
    $userService = new UserService($connection, $user);
    $users = $userService->searchUsers();
    echo json_encode($users);
} else if (isset($_GET['actionUser']) && $_GET['actionUser'] == 'deleteUser' && isset($_GET['userId']) && is_numeric($_GET['userId'])) {

    $connection = new ConnectionDB();
    $user = new User();
    $user->__set('id', $_GET['userId']);
    $userService = new UserService($connection, $user);
    $userService->deleteUser();
} else if ($_POST['actionUser'] == 'registerUser') {

    echo json_encode($_POST);
}
