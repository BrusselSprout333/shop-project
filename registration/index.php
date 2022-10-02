<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css_styles.css">
    <link rel="stylesheet" href="../css/index_styles.css">
    <style>.footer{margin-top: 200px;}</style>
</head>
<body>
<nav class="nav">
    <img class="logo" src="../img/icons/sofa.png">
    <h1>Home Furniture</h1>
    <ul class="nav-ul">
        <li class="nav-elem">
            <a href="#footer-contact" class="nav-link">
            <img class="nav-img" src="../img/icons/call.png"></a>
        </li>
    </ul>
</nav>
<main>
<div class="container">
    <?php
    session_start();
    if (empty($_SESSION['auth'])):

    $email = $_POST['email'] ?? $_GET['email'] ?? '';
    $login1 = $_POST['login1'] ?? $_GET['login1'] ?? '';
    $login2 = $_POST['login2'] ?? $_GET['login2'] ?? '';
    ?>
    <div class="row">
        <div class = "col">
            <h2>Форма регистрации</h2>
            <form action="validation-form/check.php" method="post">
                <input type="email" class="form-control" name="email" id="email"
                       value="<?=$email?>" placeholder="Введите email">
                <p class="error"><?=$_GET['email_error'];?></p>
                <input type="text" class="form-control" name="login" id="login"
                       value="<?=$login1?>" placeholder="Введите логин">
                <p class="error"><?=$_GET['login_error'];?></p>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
                <p class="error"><?=$_GET['pass_error'];?></p>
                <button class="btn-success" type="submit">Регистрация</button>
            </form>
        </div>
        <div class = "col">
            <h2>Форма авторизации</h2>
            <form action="validation-form/auth.php" method="post">
                <input type="text" class="form-control" name="login" id="login"
                       value="<?=$login2?>" placeholder="Введите логин">
                <p class="error"><?=$_GET['auth_login_error'];?></p>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
                <p class="error"><?=$_GET['auth_pass_error'];?></p>
                <button class="btn-success" type="submit">Войти в аккаунт</button>
            </form>
        </div>
    </div>
    <p style="margin-top: 20px;"><?=$_GET['text']?></p>
    <?php else: header('Location: /shop/catalog.php');
    endif;
echo "</div>";
include "../footer.php";