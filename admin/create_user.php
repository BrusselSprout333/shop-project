<?php
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$admin = $_POST['admin'];

require '../mysqli.php';
require_once 'test_create_user.php';
$uniq1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user_uniq = $uniq1->fetch_assoc();
$countUser = 0;
if(count($user_uniq) != 0) { //проверка на уникальность логина
    echo 'Такой пользователь уже есть';
    exit();
}

$uniq2 = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
$email_uniq = $uniq2->fetch_assoc();
if(count($email_uniq) != 0) { //проверка на уникальность почты
    echo 'Пользователь с таким email уже существует';
    exit();
}
$password = md5($password."eonrva34scpwp");

$mysql->query("INSERT INTO `users` (`is_admin`, `email`, `login`, `password`)
                        VALUES ('$admin', '$email', '$login', '$password')");
if(empty($_POST['admin']))
    $mysql->query("INSERT INTO `users` (`is_admin`, `email`, `login`, `password`)
                        VALUES (NULL, '$email', '$login', '$password')");

$mysql->close();
header('Location: ../admin_users.php');