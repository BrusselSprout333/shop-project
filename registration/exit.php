<?php
setcookie('user', $user['login'], time() - 3600, "/");
header('Location: /shop/registration/index.php');
