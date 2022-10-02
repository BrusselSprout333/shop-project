<?php
require 'mysqli.php';
session_start();
$this_user = $_SESSION['user'];
$users = mysqli_query($mysql, "SELECT * FROM `users` WHERE `is_admin` = 1");
$users = mysqli_fetch_all($users); //получаем данные в виде ассоц. массива
$bool = false;
foreach ($users as $user){
    if($this_user == $user[3])
       $bool = true;
}
return $bool;