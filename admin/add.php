<?php
$price = $_POST['price'];
$name = filter_var($_POST['name'],
    FILTER_SANITIZE_STRING);
$about = filter_var($_POST['about'],
    FILTER_SANITIZE_STRING);
$image = filter_var($_POST['image'],
    FILTER_SANITIZE_STRING);


if(mb_strlen($name) < 3 || mb_strlen($name) > 100)
{
    echo 'Некорректная длина названия';
    exit();
}
if($price <= 0 || $price > 10000)
{
    echo 'Некорректная цена';
    exit();
}
if(mb_strlen($about) < 5 || mb_strlen($about) > 1000)
{
    echo 'Некорректное описание';
    exit();
}
if(mb_strlen($image) < 6 || mb_strlen($image) > 100 || preg_match( '#^[a-z\dа-яё]+.jpg$#ui',$image) ==0)
{
    echo 'Некорректный адрес изображения';
    exit();
}
$mysql = new mysqli('localhost','root', 'root','shop');

$mysql->query("INSERT INTO `product` (`name`, `price`, `about`,`image`)
                        VALUES('$name', '$price', '$about', '$image')");
$mysql->close();

header('Location: /shop/admin.php');