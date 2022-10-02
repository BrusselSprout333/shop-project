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
$user = $mysql->query("SELECT * FROM `users` WHERE `id` = '$id'");
$user = $user->fetch_assoc();//получаем данные в виде ассоц. массива
?>
<h2>Обновить товар</h2>  <!-- изменение -->
<form action="vendor/update_users.php" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <p>Логин</p>
    <input type="text" name="login" value="<?= $user['login'] ?>">
    <p>Почта</p>
    <input type="text" name="email" value="<?= $user['email'] ?>">
    <p>Пароль</p>
    <input type="text" name="password" value="<?= $user['password'] ?>">
    <p>Админ</p>
    <input type="number" name="is_admin" value="<?= $user['is_admin']?>"><br>
    <button type="submit">Обновить</button>
</form>
</body>
</html>
