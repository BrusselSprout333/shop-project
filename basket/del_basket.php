<?php
//удаление товаров из корзины
session_start();
$user = $_SESSION['user'];
$del_id = $_GET['id']; //id товара
require_once "../mysqli.php";

$user = $mysql->query("SELECT `id` FROM `users` WHERE `login` = '$user'"); //нужный пользователь
$user = $user->fetch_assoc();
$id_user = $user['id']; //id текущего пользователя

$products = $mysql->query("SELECT * FROM `product_users` WHERE `id_users` = '$id_user'"); //нужный пользователь
$products = $products->fetch_all();

foreach ($products as $product) {
    $count = intval($product[3]);
    if($product[2] == $del_id){
        print_r($count);
        if($count>1) { //если больше 1, уменьшаем кол-во
            $count--;
            $mysql->query("UPDATE `product_users` SET `count` = '$count' 
                       WHERE `product_users` . `id_product` = '$del_id'");
        } else //если 1, то удаляем
            $mysql->query("DELETE FROM `product_users` WHERE `product_users`.`id` = '$product[0]'");
    }
}
$mysql->close();

header('Location: ../basket.php');
