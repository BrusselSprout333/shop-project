<?php
if(mb_strlen($name) < 3 || mb_strlen($name) > 100)
{
    echo 'Некорректная длина названия';
    exit();
}
if(!category_test($category, $mysql))
{
    echo 'Такой категории не существует';
    exit();
}
if($price <= 0 || $price > 10000)
{
    echo 'Некорректная цена';
    exit();
}
if(mb_strlen($about) < 5 || mb_strlen($about) > 1000)
{
    echo 'Некорректное описание';
    exit();
}
if(mb_strlen($image) < 6 || mb_strlen($image) > 100 || preg_match( '#^[a-z\dа-яё\_\-]+.jpg$#ui',$image) ==0)
{
    echo 'Некорректный адрес изображения';
    exit();
}

function category_test($cat, $mysql){
    $categories = $mysql->query("SELECT * FROM `category` ");
    $categories = $categories->fetch_all();
    foreach ($categories as $category) {
        if ($cat == $category[0]) {
            return true;
        }
    }
    return false;
}