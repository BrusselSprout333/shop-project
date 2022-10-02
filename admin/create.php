<?php
$price = $_POST['price'];
$name = $_POST['name'];
$about = $_POST['about'];
$image = $_POST['image'];
$category = $_POST['category'];
require '../mysqli.php';
require_once 'test_create_product.php';

$mysql->query("INSERT INTO `product` (`name`, `price`, `about`,`image`, `category_id`)
                        VALUES('$name', '$price', '$about', '$image', '$category')");
$mysql->close();

header('Location: ../admin.php');

