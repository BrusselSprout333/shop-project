<?php
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$about = $_POST['about'];
$image = $_POST['image'];
$category = $_POST['category'];
require '../../mysqli.php';
require_once '../test_create_product.php';

$mysql->query("UPDATE `product` SET `name` = '$name', `price` = '$price',
                     `about` = '$about', `image` = '$image', `category_id` = '$category'
                WHERE `product`.`id` = '$id'");
$mysql->close();

header('Location: ../../admin.php');