<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="http://localhost:8888/shop/css/css_styles.css">
    <link rel="stylesheet" href="https://
    cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="nav">
    <a href="http://localhost:8888/shop/catalog.php" ><img class="logo" src="http://localhost:8888/shop/img/sofa.png"></a>
    <h1 id="top">Home Furniture</h1>
    <ul class="nav-ul">
        <?php
        $user = $_COOKIE['user'];
        if ($user == "Admin"){
            echo '<li class="nav-elem"><a href="http://localhost:8888/shop/admin.php" class="nav-link">
                    <img class="nav-img" src="http://localhost:8888/shop/img/edit.png"></a></li>';
        }
        ?>
        <li class="nav-elem">
            <a href="http://localhost:8888/shop/catalog.php" class="nav-link">Каталог</a>
        </li>
        <li class="nav-elem"><a href="#footer-contact" class="nav-link">
                <img class="nav-img" src="http://localhost:8888/shop/img/call.png"></a>
        </li>
        <li class="nav-elem"><a href="http://localhost:8888/shop/registration/exit.php" class="nav-link">
                <img class="nav-img" src="http://localhost:8888/shop/img/logout.png"></a>
        </li>
    </ul>
</nav>
    <h2>Корзина</h2>
    <main>

    <?php
    $mysql = new mysqli('localhost','root',
    'root','shop');

    $number1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$user'");
    $num = $number1->fetch_assoc();
    $correct_num = $num["products"]; //товары у пользователя - строка

    $items_in_basket = 0;
    $suma = 0;
    $hidden_button = 0;

    if($correct_num == '') {
        $hidden_button = 1;
        echo "<p class='no-items'> Сейчас тут нет товаров </p><br>";?>
        <style>.footer{margin-top: 310px;}</style>
        <?php
    }

    echo '<ul class="catalog">';
    while ($correct_num!= '') {
        if(strripos($correct_num, ",")) {
            $corr_part = stristr($correct_num, ',', true);
            $number2 = $mysql->query("SELECT * FROM `product` WHERE `id` = '$corr_part'");
            $final = $number2->fetch_assoc(); //продукт с нужным id в его табл

            echo '<li class="product"><p><b class="name-product">' . $final["name"]
                . '</b></p><br><p>   Цена: ' . $final["price"] . ' <br> Описание: ' . $final["about"].'</p>' ;
            ?>
            <img class="image-catalog" src="http://localhost:8888/shop/img/<?=$final["image"]?>" width="300px" height="300px">
            <?php
            echo '<br><a href="/shop/basket/del_basket.php?id='
                . $final["id"] .'"><button class="btn-delete">Удалить</button></a></li><br>';

            $correct_num = str_replace($corr_part.',', '', $correct_num);
        }
        else{
            $number3 = $mysql->query("SELECT * FROM `product` WHERE `id` = '$correct_num'");
            $final = $number3->fetch_assoc(); //продукт с нужным id в его табл

            echo '<li class="product"><p><b class="name-product">' . $final["name"]
                . '</b></p><br><p>   Цена: ' . $final["price"] . ' <br> Описание: ' . $final["about"].'</p>';
            ?>
            <img class="image-catalog" src="http://localhost:8888/shop/img/<?=$final["image"]?>" width="300px" height="300px">
            <?php
            echo '<br><a href="/shop/basket/del_basket.php?id=' . $final["id"]
                . '"><button class="btn-delete">Удалить</button></a></li><br>';

            $correct_num = str_replace($correct_num, '', $correct_num);
        }
        $items_in_basket ++;
        $suma += $final["price"];
    }
    echo '</ul>';
    ?>

    <div class="summa">
    <?php
    if ($items_in_basket ==1)
        echo '<br><p>У вас ' . $items_in_basket . ' товар в корзине на сумму: <b>' .$suma. '</b></p>';
    elseif ($items_in_basket >1 && $items_in_basket<5)
        echo '<br><p>У вас ' . $items_in_basket . ' товара в корзине на сумму: <b>' .$suma. '</b></p>';
    elseif ($items_in_basket >4)
        echo '<br><p>У вас ' . $items_in_basket . ' товаров в корзине на сумму: <b>' .$suma. '</b></p>';
    ?>
    </div>

    <?php
    $mysql->close();

    if($hidden_button == 0) :
            ?>
    <button class="basket-button"><b>Купить</b></button>
        <?php endif; ?>
    </main>

<footer class="footer">
    <div class="wrapper">
        <div class="footer__top">
            <div class="footer__left">
                <a href="http://localhost:8888/shop/catalog.php" ><img class="footer__logo" src="http://localhost:8888/shop/img/sofa.png"></a>
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
</body>
</html>