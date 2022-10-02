<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/css_styles.css">
    <link rel="stylesheet" href="css/basket_styles.css">
</head>
<body>
<?php
    session_start();
    $user = $_SESSION['user'];
    require_once "test.php";
    require_once "is_admin.php";
?>
<nav class="nav">
    <a href="catalog.php" ><img class="logo" src="img/icons/sofa.png"></a>
    <h1 id="top">Home Furniture</h1>
    <ul class="nav-ul">
        <?php
        $user = $_SESSION['user'];
        if ($bool)
            echo '<li class="nav-elem"><a href="admin.php" class="nav-link">
                    <img class="nav-img" src="img/icons/edit.png"></a></li>';
        ?>
        <li class="nav-elem">
            <a href="catalog.php" class="nav-link">Каталог</a></li>
        <li class="nav-elem"><a href="#footer-contact" class="nav-link">
                <img class="nav-img" src="img/icons/call.png"></a></li>
        <li class="nav-elem"><a href="registration/exit.php" class="nav-link">
                <img class="nav-img" src="img/icons/logout.png"></a></li>
    </ul>
</nav>
<main>
    <h2>Корзина</h2>
    <?php
    require_once "mysqli.php";
    $items_in_basket = 0;
    $suma = 0;
    $user_bd = $mysql->query("SELECT * FROM `users` WHERE `login` = '$user'");
    $user_bd = $user_bd->fetch_assoc();

    $products = $mysql->query("SELECT * FROM `product_users` WHERE `id_users` = '$user_bd[id]'");
    $products = $products->fetch_all(); //массив номеров продуктов

    echo '<ul class="catalog">';
    foreach ($products as $product)
    {
        if($product[1] == $user_bd['id'])
        {
            $product_db = $mysql->query("SELECT * FROM `product` WHERE `id` = '$product[2]'");
            $product_db = $product_db->fetch_assoc();
            ?>
            <li class="product">
                <div class="basket_count">
                    <p><b class="name-product"><?=$product_db["name"]?></b></p>
                    <p class="product_count"><?=$product[3];?></p>
                </div><br>
                <p><?=$product_db["about"]?></p>
                <img class="image-catalog" src="img/<?=$product_db["image"]?>">
                <p class="price"><b><?=$product_db["price"]?> byn</b></p>
                <a href="basket/del_basket.php?id=<?=$product_db["id"]?>">
                <button class="btn-delete">Удалить</button></a>
            </li><br>
            <?php
            $items_in_basket+=$product[3];
            $suma += $product_db["price"]*$product[3];
        }
    }
    echo '</ul>
    <div class="summa">';
        if ($items_in_basket ==1)
            echo '<br><p>У вас ' . $items_in_basket . ' товар в корзине на сумму: <b>' .$suma. '</b></p>';
        elseif ($items_in_basket >1 && $items_in_basket<5)
            echo '<br><p>У вас ' . $items_in_basket . ' товара в корзине на сумму: <b>' .$suma. '</b></p>';
        elseif ($items_in_basket >=5)
            echo '<br><p>У вас ' . $items_in_basket . ' товаров в корзине на сумму: <b>' .$suma. '</b></p>';
    echo "</div>";
    if($items_in_basket > 0)
        echo "<button class='basket-button'><b>Заказать</b></button>";
    else
        echo "<p class='no-items'> Сейчас тут нет товаров </p><br>
                <style>.footer{margin-top: 335px;}</style>";

    include "footer.php";