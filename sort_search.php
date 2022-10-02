<div class="catalog_flex">
    <form action="catalog.php" method="post" class="catalog_sort">
        <input type="hidden" name="search" value="<?=$search?>">
        <input type="hidden" name="category" value="<?=$category_id?>">
        <div class="radio-item item1">
            <input type="radio" name="sort" value="`name` ASC" id="sort1" class="catalog_sort"
                <?= $sort=="`name` ASC" ? 'checked="checked" ' : ''; ?>>
            <label for="sort1">По возрастанию (а-я)</label>
        </div>
        <div class="radio-item item2">
            <input type="radio" name="sort" value="`name` DESC" id="sort2" class="catalog_sort"
                <?= $sort=="`name` DESC" ? 'checked="checked" ' : ''; ?>>
            <label for="sort2">По убыванию (я-а)</label>
        </div>
        <div class="radio-item item3">
            <input type="radio" name="sort" value="`price` ASC" id="sort3" class="catalog_sort"
                <?= $sort=="`price` ASC" ? 'checked="checked" ' : ''; ?>>
            <label for="sort3">По возрастанию цены</label>
        </div>
        <div class="radio-item item4">
            <input type="radio" name="sort" value="`price` DESC" id="sort4" class="catalog_sort"
                <?= $sort=="`price` DESC" ? 'checked="checked" ' : ''; ?>>
            <label for="sort4">По убыванию цены</label>
        </div><br>
        <button type="submit" class="sort_btn">Выбрать</button>
    </form>
    <!-- поиск -->
    <form action="catalog.php" method="post" class="catalog_search">
        <input type="hidden" name="sort" value="<?=$sort?>">
        <input type="text" placeholder="Поиск" class="search_input"
               name="search" value="<?= $search ?>"><br>
        <button type="submit" class="search_btn">Найти</button>
    </form>
</div>