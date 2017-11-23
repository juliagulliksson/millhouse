<div class="sidebar">
    <div class="sidebar-about">
        <h3>Millhouse</h3>
        <p>
            Based in the heart of Stockholm, Millhouse brings you some of the finest fashion items of the world.
        </p>
        <p>
            At Millhouse you find elegant watches and sunglasses that combine high quality and fashion. We want your look to be both modern and timeless at the same time. The right accessories brings out the best in your personal style and make you the center of the party. 
        </p>
        <p>
            Millhouse interior combines tasteful Swedish design with a unique and luxurious twist. Making your home the talk of the town (in a good way).
        </p>
    </div>
    <h3 id="categories">Categories</h3>
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