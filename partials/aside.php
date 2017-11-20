<div class="sidebar">
    <div class="">
        <h3>MILLHOUSE</h3>
        <p>
            Marabou är ett av Sveriges mest älskade varumärken, med
            choklad som får oss att säga Mmm...
        </p>

        <p>
            Marabou är en del av koncernen Mondelēz International, världens
            största chokladföretag. Förutom våra egna nordiska varumärken
            Marabou och Freia finns här choklad från Milka, Cadbury, Toblerone,
            Côte d’Or och Suchard.
        </p>
    </div>
    <br /><!-- This one is just temporary and should be replaced with margin/padding-styling -->
    <h3>Categories</h3>
    <div class="categories-list">
        <ul>
        <?php foreach ($category_disctinct as $categories): ?>
            <li>
                <a href="index.php?category=<?= $categories['id']?>">
                <?= $categories['title'] ?> (<?= $categories['posts']?>)</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
    <!-- /.categories-list-collapse -->
                
    <h3>Archive</h3>
    <div class="categories-list">
        <ul>
        <?php foreach ($month_number as $months):
            $month = $months['month'];
        ?>
            <li>
                <a href="index.php?month=<?= $months['month']?>">
                <?= replace_month($month) ?> (<?= $months['posts']?>)</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
    <!-- /. categories-list-collapse -->
</div>
<!-- /.sidebar-collapse -->