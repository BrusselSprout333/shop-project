<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обновить товар</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    require_once "../test.php";
    $id = $_GET['id'];
    require '../mysqli.php';
    $good = $mysql->query("SELECT * FROM `product` WHERE `id` = '$id'");
    $good = $good->fetch_assoc();//получаем данные в виде ассоц. массива
    ?>
    <h2>Обновить товар</h2>  <!-- изменение -->
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <p>Название</p>
        <input type="text" name="name" value="<?= $good['name'] ?>">
        <p>Категория</p>
        <input type="text" name="category" value="<?= $good['category_id'] ?>">
        <p>Описание</p>
        <textarea name="about"><?= $good['about'] ?></textarea>
        <p>Цена</p>
        <input type="number" name="price" value="<?= $good['price'] ?>">
        <p>Адрес фото</p>
        <input type="text" name="image" value="<?= $good['image'] ?>"><br>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>
