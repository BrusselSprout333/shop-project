<?php
require_once "is_admin.php";
require_once "basket/basket_items.php";
?>
<!-- шапка -->
<nav class="nav">
    <a href="catalog.php" ><img class="logo" src="img/icons/sofa.png"></a>
    <h1>Home Furniture</h1>
    <ul class="nav-ul">
        <?php
        if ($bool){
            echo '<li class="nav-elem"><a href="admin.php" class="nav-link"><img class="nav-img" src="img/icons/edit.png"></a></li>';}
        ?>
        <li class="nav-elem">
            <a href="basket.php" class="nav-link"><img class="nav-img" src="img/icons/basket.png"></a>
            <sub class="basket-items"><?=$items_in_basket?></sub>
        </li>
        <li class="nav-elem"><a href="#footer-contact" class="nav-link">
                <img class="nav-img" src="img/icons/call.png"></a></li>
        <li class="nav-elem"><a href="registration/exit.php" class="nav-link"><img class="nav-img" src="img/icons/logout.png"></a></li>
    </ul>
</nav>