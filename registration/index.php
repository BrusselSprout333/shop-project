<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8888/shop/css/css_styles.css">
</head>
<body>
<nav class="nav">
    <img class="logo" src="http://localhost:8888/shop/img/sofa.png">
    <h1>Home Furniture</h1>
    <ul class="nav-ul">
        <li class="nav-elem"><a href="#" class="nav-link">
                <img class="nav-img" src="http://localhost:8888/shop/img/call.png"></a></li>
    </ul>
</nav>

<div class="container">
    <?php
    if($_COOKIE['user'] == ''):
    ?>
    <div class="row">
        <div class = "col">
            <h2>Форма регистрации</h2>
            <form action="validation-form/check.php" method="post">
                <input type="email" class="form-control" name="email" id="email"
                       value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="Введите email"><br>
                <input type="text" class="form-control" name="login" id="login"
                       value="<?php if (isset($_POST['login'])) echo $_POST['login'] ?>" placeholder="Введите логин"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
                <button class="btn-success" type="submit">Регистрация</button>
            </form>
        </div>
        <div class = "col">
            <h2>Форма авторизации</h2>
            <form action="validation-form/auth.php" method="post">
                <input type="text" class="form-control" name="login" id="login"
                       value="<?php if (isset($_POST['login'])) echo $_POST['login'] ?>" placeholder="Введите логин"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
                <button class="btn-success" type="submit">Войти в аккаунт</button>
            </form>
        </div>
    </div>
    <?php else: header('Location: /shop/catalog.php');
    endif;

    ?>

</div>
</body>
</html>