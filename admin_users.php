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
    <p><a href="admin.php"><button>Товары</button></a></p>
    <main>
    <form action="admin/create_user.php" method="post">
        <input type="text" name="login" id="login" placeholder="Логин"
               value="<?= $_POST['login'] ?? '' ?>" class="form-control">
        <input type="text" name="password" id="password" placeholder="Пароль"
               value="<?= $_POST['password'] ?? '' ?>" class="form-control">
        <input type="text" name="email" id="email" placeholder="Email"
               value="<?= $_POST['email'] ?? '' ?>" class="form-control">
        <input type="text" name="admin" id="admin" placeholder="Админ"
               value="<?= $_POST['admin'] ?? '' ?>" class="form-control">
        <button type="submit" name="sendTask" class="btn btn-success">Создать пользователя</button>
    </form>
    <?php //сами товары плюс кнопка удаления
    require_once 'mysqli.php';
    $users = $mysql->query("SELECT * FROM `users` ");
    $users = $users->fetch_all();
    echo '<ol>';
    foreach ($users as $user)
    {
        $admin = 'нет';
        if ($user[1] == 1) $admin='да';
        echo '<li>Логин: '.$user[3].'<br>
                Админ: '.$admin.'<br>
                Почта: '.$user[2].'<br>
                <a href="admin/delete_user.php?id=' .$user[0].'">
                <button>&#10060;</button></a>
                <a href="admin/update_users.php?id=' .$user[0].'">
                <button style="font-size: 15px">&#9998;</button></a>
                </li><br>';
    }
    echo '</ol>';