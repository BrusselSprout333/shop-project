<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/css_styles.css">
    <link rel="stylesheet" href="css/catalog_styles.css">
</head>
<body>
<?php
    session_start();
    require_once "test.php";
    require_once "is_admin.php";
    require_once "basket/basket_items.php";
    require_once "mysqli.php";
    $user = $_SESSION['user'];

    $sort = $_POST['sort'] ?? $_GET['sort'] ?? '`name` ASC';
    $sort = filter_var(trim($sort), FILTER_SANITIZE_STRING); //фильтр как строку

    $search = filter_var(trim($_POST['search']), FILTER_SANITIZE_STRING);
    $category_id = $_POST['category'] ?? $_GET['category'] ?? '';

    $sql = "SELECT * FROM `product`";
    if($search)
        $sql = "SELECT * FROM `product` WHERE LOWER(`name`) REGEXP LOWER('$search')";
?>
<nav class="nav"> <!-- шапка -->
    <a href="catalog.php" ><img class="logo" src="img/icons/sofa.png"></a>
    <h1>Home Furniture</h1>
    <ul class="nav-ul">
        <?php
        if ($bool)
            echo '<li class="nav-elem"><a href="admin.php" class="nav-link"><img class="nav-img" src="img/icons/edit.png"></a></li>';
        ?>
        <li class="nav-elem">
            <a href="basket.php" class="nav-link"><img class="nav-img" src="img/icons/basket.png"></a>
            <sub class="basket-items"><?=$items_in_basket?></sub>
        </li>
        <li class="nav-elem"><a href="#footer-contact" class="nav-link">
                <img class="nav-img" src="img/icons/call.png"></a></li>
        <li class="nav-elem"><a href="registration/exit.php" class="nav-link"><img class="nav-img" src="img/icons/logout.png"></a></li>
    </ul>
</nav>
<main>
    <h2>Каталог</h2>
    <?php
    echo "<p style='margin: 10px;'>".$_GET['text']."</p>"; //ошибки
    require_once "categories.php"; //категории
    require_once "sort_search.php"; //сортировки

    if(!empty($category_id)) { //получаем категорию если существует
        $category = $mysql->query("SELECT * FROM `category` WHERE `id` = $category_id");
        $category = $category->fetch_assoc();
        if ($category_id != 1)
            echo '<h2 class="category_name">' . $category['name'] . '</h2>';
    }
    $products_num = 0;
    if ($category_id == 1 || empty($category_id)) //получаем все товары
        $products = $mysql->query("$sql ORDER BY `product`.$sort");
    else //получаем по категориям
        $products = $mysql->query("$sql WHERE `category_id`=$category_id ORDER BY `product`.$sort");

    $products = $products->fetch_all();
    echo '<ul class="catalog">';
    foreach ($products as $product) { //вывод товаров
    ?>
        <li class="product">
            <p><b class="name-product"><?=$product[1]?></b></p><br>
            <p><?=$product[3]?></p>
            <img class="image-catalog" src="img/<?=$product[4]?>">
            <p class="price"><b><?=$product[2]?> byn</b></p>
            <a href="/shop/basket/add_basket.php?id=<?=$product[0]?>">
                <button class="add-to-basket">Купить</button></a>
        </li><br>
    <?php
    $products_num++;
    }
    echo '</ul>';

    if($products_num == 0) // если ничего нет
        echo "<p style='margin: 24px 30px 100px;'>Ничего не найдено</p>";

    include "footer.php";