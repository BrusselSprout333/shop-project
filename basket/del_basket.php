<?php
//удаление товаров из корзины
$del_id = $_GET['id'];
$user = $_COOKIE['user'];

$mysql = new mysqli('localhost','root', 'root','shop');
$number1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$user'"); //нужный пользователь
$num = $number1->fetch_assoc();
$correct_num = $num["products"]; //товары у пользователя

echo $correct_num.'<br>';
echo $del_id.'<br>';

if($del_id == $correct_num)
    $corr_part = str_replace($del_id, '', $correct_num);

elseif(strripos($correct_num, ','.$del_id))
    $corr_part = str_replace(','.$del_id, '', $correct_num);

else
    $corr_part = str_replace($del_id . ',', '', $correct_num);

echo $corr_part . '<br>'; //то что возвращается обратно

$mysql->query("UPDATE `users` SET `products` = '$corr_part' WHERE `users`.`login` = '$user'");
$mysql->close();

header('Location: /shop/basket/basket.php');