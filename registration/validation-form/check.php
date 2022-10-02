<?php
    $login = quotemeta(filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING)); //фильтр как строку
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $pass = quotemeta(filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));

    if(mb_strlen($email) < 5 || mb_strlen($email) > 90)
    {
        header('Location: ../index.php?email_error=Недопустимая длина email
                        &login1='.$login.'&email='.$email);
        exit();
    }
    if(mb_strlen($login) < 3 || mb_strlen($login) > 90)
    {
        // проверка на отсутствие символов кроме букв и цифр
        header('Location: ../index.php?login_error=Недопустимая длина логина
                        &login1='.$login.'&email='.$email);
        exit();
    }
    if (preg_match( '#^[a-z\dа-яё]+$#ui',$login) ==0)
    {
        header('Location: ../index.php?login_error=Ваш логин пустой или содержит запрещенные символы
                        &login1='.$login.'&email='.$email);
        exit();
    }
    if(mb_strlen($pass) < 5 || mb_strlen($pass) > 90)
    {
        header('Location: ../index.php?pass_error=Недопустимая длина пароля
                        &login1='.$login.'&email='.$email);
        exit();
    }
    if (preg_match( '#^[a-z\dа-яё]+$#ui',$pass) ==0)
    {
        header('Location: ../index.php?pass_error=Ваш пароль пустой или содержит запрещенные символы
                        &login1='.$login.'&email='.$email);
        exit();
    }
    $pass = md5($pass."eonrva34scpwp");
    require_once "../../mysqli.php";
    //получаем всех пользователей
    $uniq1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
    $user_uniq = $uniq1->fetch_assoc();
    $countUser = 0;
    if(count($user_uniq) != 0) { //проверка на уникальность логина
        header('Location: ../index.php?pass_error=Такой пользователь уже есть
                        &login1='.$login.'&email='.$email);
        exit();
    }

    $uniq2 = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $email_uniq = $uniq2->fetch_assoc();
    if(count($email_uniq) != 0) { //проверка на уникальность почты
        header('Location: ../index.php?email_error=Пользователь с таким email уже существует
                        &login1='.$login.'&email='.$email);
        exit();
    }
    $mysql->query("INSERT INTO `users` (`login`, `password`, `email`)
                        VALUES('$login', '$pass', '$email')");
    //добавляем в бд
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['user'] = $user['login'];
    $_SESSION['auth'] = true;

    $mysql->close();
    header('Location: /shop/catalog.php');