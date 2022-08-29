<?php
//закидывать в таблицу товары по id  в  products
$id = $_GET['id'];
$user = $_COOKIE['user'];

$mysql = new mysqli('localhost','root',
    'root','shop');
//$mysql->query("UPDATE `users` SET `products` = '$id' WHERE `users`.`login` = '$user'");
$number1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$user'"); //нужный пользователь
$num = $number1->fetch_assoc();
$correct_num = $num["products"]; //товары у пользователя

$mysql->query("UPDATE `users` SET `products` = '$id,$correct_num' WHERE `users`.`login` = '$user'");

$mysql->close();

header('Location: /shop/catalog.php');

