<?php
//удаление товара админом
$id = $_GET['id'];
require '../mysqli.php';
$mysql->query("DELETE FROM `users` WHERE `id` = '$id'");

header('Location: /shop/admin_users.php');
