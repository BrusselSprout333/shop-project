<?php
$id = $_POST['id'];
$login = $_POST['login'];
$password = $_POST['password']; //введенный
$email = $_POST['email'];
$is_admin = $_POST['is_admin'];

require '../../mysqli.php';
$password_check = md5($password."eonrva34scpwp"); //хешируем
$check = $mysql->query("SELECT `password` FROM `users` WHERE `id` = '$id'");
$check = $check->fetch_assoc();
if($check['password'] != $password){
    $password = $password_check;
}

require_once '../test_create_user.php';

$mysql->query("UPDATE `users` SET `login` = '$login', `password` = '$password',
                        `email` = '$email', `is_admin` = '$is_admin'
                        WHERE `users`.`id` = '$id'");
if(empty($_POST['is_admin']))
    $mysql->query("UPDATE `users` SET `login` = '$login', `password` = '$password',
                        `email` = '$email', `is_admin` = NULL
                        WHERE `users`.`id` = '$id'");
$mysql->close();

header('Location: ../../admin_users.php');
