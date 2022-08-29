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
        <li class="nav-elem"><a href="#" class="nav-link">
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
<footer>
    <p class="footer">2020-2022</p>
    <!-- footer по примеру -->
</footer>
</html>
