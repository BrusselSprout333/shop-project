<?php
session_start();
if (empty($_SESSION['auth'])) {
    if(file_exists('registration/index.php')){
        header('Location: registration/index.php?text=Сначала необходимо авторизоваться');
    }
    else
    header('Location: ../registration/index.php?text=Сначала необходимо авторизоваться');
}