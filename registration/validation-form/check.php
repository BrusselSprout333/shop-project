<?php
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING); //фильтр как строку
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 3 || mb_strlen() > 90)
    {
        // проверка на отсутствие символов кроме букв и цифр
        if (preg_match( '#^[a-z\dа-яё]+$#ui',$login) ==0)
        {
            echo 'Ваш логин содержит запрещенные символы';
            exit();
        }
        echo "Недопустимая длина логина";
        exit();
    }
if(mb_strlen($email) < 5 || mb_strlen() > 90)
{
    echo "Недопустимая длина имени";
    exit();
}
if(mb_strlen($pass) < 5 || mb_strlen() > 90)
{
    if (preg_match( '#^[a-z\dа-яё]+$#ui',$pass) ==0)
    {
        echo 'Ваш пароль содержит запрещенные символы';
        exit();
    }
    echo "Недопустимая длина пароля";
    exit();
}
$pass = md5($pass."eonrva34scpwp");

$mysql = new mysqli('localhost','root', 'root','shop');

$uniq1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user_uniq = $uniq1->fetch_assoc();
$countUser = 0;
if(count($user_uniq) != 0) {
    echo "Такой пользователь уже есть";
    exit();
}

$uniq2 = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
$email_uniq = $uniq2->fetch_assoc();
if(count($email_uniq) != 0) {
    echo "Пользователь с таким email уже существует";
    exit();
}

    $mysql->query("INSERT INTO `users` (`login`, `password`, `email`)
                        VALUES('$login', '$pass', '$email')");

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
    $user = $result->fetch_assoc();
    setcookie('user', $user['login'], time() + 3600, "/");
$mysql->close();

    header('Location: /shop/catalog.php');