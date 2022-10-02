<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обзор товара</title>
    <link rel="stylesheet" href="../css/css_styles.css">
</head>
<body>
<?php require_once "../test.php"; ?>
<p><a href="../admin.php"><button>Назад</button></a></p>
<?php
$id = $_GET['id'];
require '../mysqli.php';
$good = $mysql->query("SELECT * FROM `product` WHERE `id` = '$id'");
$good = $good->fetch_assoc(); //получаем данные в виде ассоц. массива
?>
<div class="catalog">
    <div class="product" style="margin: 50px auto;">
        <p><b class="name-product"><?=$good["name"]?></b></p><br>
        <p><?=$good["about"]?></p>
        <img class="image-catalog" src="../img/<?=$good["image"]?>">
        <p class="price"><b><?=$good["price"]?> byn</b></p>
        <a href=""><button class="add-to-basket">Купить</button></a><br>
    </div>
</div>
