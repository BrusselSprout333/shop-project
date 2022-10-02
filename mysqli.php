<?php
$mysql = new mysqli('localhost','root', 'root','myshop');
if(!$mysql){
    die();
}