<?php
//удаление товара админом
$id = $_GET['id'];
require '../mysqli.php';
$mysql->query("DELETE FROM `product` WHERE `id` = '$id'");

header('Location: /shop/admin.php');