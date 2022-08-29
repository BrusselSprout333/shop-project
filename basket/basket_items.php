<?php
$user = $_COOKIE['user'];
$mysql = new mysqli('localhost','root',
    'root','shop');

$number1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$user'");
$num = $number1->fetch_assoc();
$correct_num = $num["products"];
$items_in_basket = 0;
while ($correct_num!= '') {
    if(strripos($correct_num, ",")) {
        $corr_part = stristr($correct_num, ',', true);
        $number2 = $mysql->query("SELECT * FROM `product` WHERE `id` = '$corr_part'");
        $final = $number2->fetch_assoc(); //продукт с нужным id в его табл
        $correct_num = str_replace($corr_part.',', '', $correct_num);
    }
    else{
        $number3 = $mysql->query("SELECT * FROM `product` WHERE `id` = '$correct_num'");
        $final = $number3->fetch_assoc(); //продукт с нужным id в его табл
        $correct_num = str_replace($correct_num, '', $correct_num);
    }
    $items_in_basket ++;
}
$mysql->close();