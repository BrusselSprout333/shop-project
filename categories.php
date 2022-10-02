<?php
require_once "mysqli.php";

$categories = $mysql->query("SELECT * FROM `category` ");
$categories = $categories->fetch_all();
echo "<div class='all_categories'>";
foreach ($categories as $category)
{
    echo "
    <div class='category'>
        <a href='catalog.php?category=$category[0]&sort=$sort'>";?>
            <img class='category_photo' src='img/icons/<?=$category[2]?>'>
        </a>
    <p class="category_text"><?=$category[1];?></p>
    </div>
    <?php
}
echo "</div>";