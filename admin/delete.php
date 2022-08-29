<?php
//удаление товара админом

$id = $_GET['id'];

$mysql = new mysqli('localhost','root', 'root','shop');
$mysql->query("DELETE FROM `product` WHERE `id` = '$id'");

header('Location: /shop/admin.php');