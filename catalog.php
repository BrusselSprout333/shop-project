<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/css_styles.css">
    <link rel="stylesheet" href="https://
    cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php
    require "basket/basket_items.php";
    $user = $_COOKIE['user'];
?>
<nav class="nav">
    <a href="catalog.php" ><img class="logo" src="img/sofa.png"></a>
    <h1>Home Furniture</h1>
    <ul class="nav-ul">
        <?php
        if ($user == "Admin"){
            echo '<li class="nav-elem"><a href="admin.php" class="nav-link"><img class="nav-img" src="img/edit.png"></a></li>';}
        ?>
        <li class="nav-elem">
            <a href="basket/basket.php" class="nav-link"><img class="nav-img" src="img/basket.png"></a>
            <sub class="basket-items"><?=$items_in_basket?></sub>
        </li>
        <li class="nav-elem"><a href="#footer-contact" class="nav-link">
                <img class="nav-img" src="http://localhost:8888/shop/img/call.png"></a></li>
        <li class="nav-elem"><a href="/shop/registration/exit.php" class="nav-link"><img class="nav-img" src="img/logout.png"></a></li>
    </ul>
</nav>

<h2>Каталог</h2>
    <main>
    <?php
    require "configDB.php";

    $query = $pdo->query('SELECT * FROM `product` ORDER BY `id` DESC');
    echo '<ul class="catalog">';
    while($row = $query->fetch(PDO::FETCH_OBJ))
    {
        echo '<li class="product"><p><b class="name-product">'.$row->name.'</b></p>
        <br><p>   Цена: '.$row->price.' 
        <br> Описание: '.$row->about.'</p>';
        ?>

        <img class="image-catalog" src="img/<?=$row->image?>" width="300px" height="300px">

        <?php
            echo '<br><a href="/shop/basket/add_basket.php?id=' .$row->id.'">
            <button class="add-to-basket">Купить</button></a></li><br>';
    }
    echo '</ul>';
    ?>

    </main>
</body>
<footer class="footer">
    <div class="wrapper">
        <div class="footer__top">
            <div class="footer__left">
                <a href="catalog.php" ><img class="footer__logo" src="img/sofa.png"></a>
                <p class="footer__title">Home Furniture</p>

                </a>
            </div>
            <div class="footer__right">
                <div class="footer__contact">
                    <a name="footer-contact"></a>
                    Контакты
                </div>
                <div class="footer__phone">
                    +375 (029) 000-00-00
                </div>
                <div class="footer__address">
                    Минск, ул. Одинцовa, д. 1, оф. 1
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            © 2022 Home Furniture All Rights Reserved.
        </div>
    </div>
</footer>
</html>
