<?php
session_start();
unset($_SESSION['user']);
$_SESSION['auth'] = false;
header('Location: /shop/registration/index.php');
