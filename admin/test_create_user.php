<?php
if(mb_strlen($email) < 5 || mb_strlen($email) > 90)
{
    echo 'Недопустимая длина email';
    exit();
}
if(mb_strlen($login) < 3 || mb_strlen($login) > 90)
{
    echo 'Недопустимая длина логина';
    exit();
}
if (preg_match( '#^[a-z\dа-яё]+$#ui',$login) ==0)
{
    echo 'Логин пустой или содержит запрещенные символы';
    exit();
}
if(mb_strlen($password) < 5 || mb_strlen($password) > 90)
{
    echo 'Недопустимая длина пароля';
    exit();
}
if (preg_match( '#^[a-z\dа-яё]+$#ui',$password) ==0)
{
    echo 'Ваш пароль пустой или содержит запрещенные символы';
    exit();
}