<?php
//закидывать в таблицу товары по id  в  products
session_start();
$id_product = $_GET['id']; //id товара
$user = $_SESSION['user'];

require_once "../mysqli.php";
$user = $mysql->query("SELECT `id` FROM `users` WHERE `login` = '$user'"); //нужный пользователь
$user = $user->fetch_assoc();

$products = $mysql->query("SELECT * FROM `product_users` WHERE `id_users` = '$user[id]'"); //нужный пользователь
$products = $products->fetch_all();

$num = 0;
foreach ($products as $product){
    $count = intval($product[3]);
    if($product[2] == $id_product) {
        $count++;$num++;
        $mysql->query("UPDATE `product_users` SET `count` = '$count' 
                       WHERE `product_users` . `id_product` = '$id_product'");
    }
}
if($num == 0)
    $mysql->query("INSERT INTO `product_users` (`id`, `id_users`, `id_product`) 
                        VALUES (NULL, '$user[id]', '$id_product')");

$mysql->close();
header('Location: ../catalog.php');