<body>
<p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/shop/registration/exit.php">здесь</a>.</p>
<div class="container">
    <h1>Редактор администратора</h1>
    <p><a href="/shop/catalog.php"><button>Каталог</button></a></p>
    <main>
    <form action="/shop/admin/add.php" method="post">
        <input type="text" name="name" id="name" placeholder="Название"
               value="<?php if (isset($_POST['name'])) echo $_POST['name'] ?>" class="form-control">
        <input type="text" name="price" id="price" placeholder="Цена"
               value="<?php if (isset($_POST['price'])) echo $_POST['price'] ?>" class="form-control">
        <textarea name="about" id="about" placeholder="Описание"
                  value="<?php if (isset($_POST['about'])) echo $_POST['about'] ?>"
                  class="form-control"></textarea>
        <input type="text" name="image" id="image" placeholder="Изображение"
               value="<?php if (isset($_POST['image'])) echo $_POST['image'] ?>" class="form-control">

        <button type="submit" name="sendTask" class="btn btn-success">Создать товар</button>
    </form>

    <?php //сами товары плюс кнопка удаления
    require 'configDB.php';

    echo '<ul>';
    $query = $pdo->query('SELECT * FROM `product` ORDER BY `id` DESC');
    while($row = $query->fetch(PDO::FETCH_OBJ))
    {
        echo '<li><b>'.$row->name.'</b><br>   Цена: '.$row->price.' <br> Описание: '.$row->about
                .'<br>   Адрес изображения: '.$row->image
    .'<br><a href="/shop/admin/delete.php?id=' .$row->id.'"><button>Удалить</button></a></li><br>';
    }
    echo '</ul>';

    ?>
    </main>
</div>
</body>