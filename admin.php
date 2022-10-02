<?php
session_start();
require_once "test.php";
require_once "is_admin.php";
$user = $_SESSION['user'];
if (!$bool)
    header('Location: catalog.php?text=У вас нет прав');
?>
<body>
<p>Привет <?=$user?>. Чтобы выйти нажмите <a href="registration/exit.php">здесь</a>.</p>
<div class="container">
    <h1>Редактор администратора</h1>
    <p><a href="catalog.php"><button>Каталог</button></a></p>
    <p><a href="admin_users.php"><button>Пользователи</button></a></p>
    <main>
    <form action="admin/create.php" method="post">
        <input type="text" name="name" id="name" placeholder="Название"
               value="<?= $_POST['name'] ?? '' ?>" class="form-control">
        <input type="text" name="category" id="category" placeholder="Номер категории"
               value="<?= $_POST['category'] ?? '' ?>" class="form-control">
        <input type="text" name="price" id="price" placeholder="Цена"
               value="<?= $_POST['price'] ?? '' ?>" class="form-control">
        <textarea name="about" id="about" placeholder="Описание"
               value="<?= $_POST['about'] ?? '' ?>" class="form-control"></textarea>
        <input type="text" name="image" id="image" placeholder="Изображение"
               value="<?= $_POST['image'] ?? '' ?>" class="form-control">
        <button type="submit" name="sendTask" class="btn btn-success">Создать товар</button>
    </form>
    <?php //сами товары плюс кнопка удаления
    require_once 'mysqli.php';
    $categories = $mysql->query("SELECT * FROM `category` ");
    $categories = $categories->fetch_all();

    $products = $mysql->query('SELECT * FROM `product` ORDER BY `id` DESC');
    $products = $products->fetch_all();
    echo '<ol>';
    foreach ($products as $product)
    {
        foreach ($categories as $category)
            if($category[0] == $product[5])
                $cat = $category[1];

          echo '<li><b>'.$product[1].'</b><br>
                Категория: '.$product[5].' ('.$cat.')<br>
                Цена: '.$product[2].' byn<br> '
                .$product[3] .'<br>
                Адрес изображения: '.$product[4] .'<br>
                <a href="admin/delete.php?id=' .$product[0].'">
                <button>&#10060;</button></a>
                <a href="admin/update.php?id=' .$product[0].'">
                <button style="font-size: 15px">&#9998;</button></a>
                <a href="admin/read.php?id=' .$product[0].'">
                <button>&#128269;</button></a></li>
                <br>';
    }
    echo '</ol>';
    ?>
    </main>
</div>
</body>
