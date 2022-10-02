<?php
require_once "mysqli.php";
session_start();
$user = $_SESSION['user'];
$user_bd = $mysql->query("SELECT * FROM `users` WHERE `login` = '$user'");
$user_bd = $user_bd->fetch_assoc();
$user_id = $user_bd["id"];

$products = $mysql->query("SELECT * FROM `product_users` WHERE `id_users` = '$user_id'");
$products = $products->fetch_all(); //массив номеров из таблицы product_users

$items_in_basket = 0;
foreach ($products as $product)
    $items_in_basket+=$product[3];
