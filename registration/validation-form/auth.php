<?php
$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING); //фильтр как строку
$password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING); //фильтр как строку

if(!$login) {
    header('Location: ../index.php?auth_login_error=Введите логин');
    exit();
}
if(!$password) {
    header('Location: ../index.php?auth_pass_error=Введите пароль&login2='.$login);
    exit();
}
$password = md5($password."eonrva34scpwp");
require_once "../../mysqli.php";

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();

if(count($user) == 0) {
    header('Location: ../index.php?auth_pass_error=Такой пользователь не найден&login2='.$login);
    exit();
}

setcookie('user', $user['login'], time() + 3600, "/");
session_start();
$_SESSION['user'] = $user['login'];
$_SESSION['auth'] = true;

$mysql->close();

header('Location:/shop/catalog.php');

