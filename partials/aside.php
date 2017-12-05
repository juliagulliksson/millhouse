<div class="sidebar">
    <div class="sidebar-about">
        <h3 class="sidebar-heading">Millhouse</h3>
        <p>
            Based in the heart of Stockholm, Millhouse brings you some of the finest
            fashion items of the world.
        </p>
        <p>
            At Millhouse you find elegant watches and sunglasses that combine high
            quality and fashion. We want your look to be both modern and timeless
            at the same time. The right accessories brings out the best in your
            personal style and make you the center of the party. 
        </p>
        <p>
            Millhouse interior combines tasteful Swedish design with a unique and
            luxurious twist. Making your home the talk of the town (in a good way).
        </p>
    </div>
    <div class="categories-list">
        <h3 id="categories">Categories</h3>
        <ul>
        <?php foreach ($categories_disctinct as $category): ?>
            <li>
                <a href="index.php?category=<?= $category['id']?>">
                <?= $category['title'] ?> (<?= $category['number_of_posts']?>)</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
    <!-- /.categories-list-collapse -->
    <div class="categories-list">
        <h3 class="archive">Archive</h3>
        <ul>
        <?php foreach ($months_number as $month): $month_number = $month['month']; ?>
            <li>
                <a href="index.php?month=<?= $month['month']?>">
                <?= replace_month($month_number) ?> (<?= $month['number_of_posts']?>)</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
    <!-- /. categories-list-collapse -->
</div>
<!-- /.sidebar-collapse -->