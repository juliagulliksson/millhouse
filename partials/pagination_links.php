<div class="page_number">
    <a href="index.php?page=1">HOME</a>
    <?php 
    if($page -1 >= 1){ ?> 
    <a href="index.php?page=<?= $page - 1 ?>">&laquo;</a>
    <?php }
    if($page -1 >= 1){ ?>       
        <a href="index.php?page=<?= $page - 1 ?>"><?= $page - 1; } ?></a>
        <a id="current_page" href="index.php?page=<?= $page ?>"><?= $page ?></a>
    <?php 
    if($page < $last_page ){ ?>
        <a href="index.php?page=<?= $page + 1 ?>"><?= $page + 1 ?></a>
        <?php }
    if($page + 1 < $last_page ){ ?>
        <a href="index.php?page=<?= $page + 2 ?>"><?= $page + 2 ?></a>
        <?php  } 
    if($page + 2 < $last_page ){ ?>
        <a href="index.php?page=<?= $page + 3 ?>"><?= $page + 3?></a>
        <?php  } 
    
    if($page < $last_page ){ ?>             
        <a href="index.php?page=<?= $page + 1 ?>">&raquo;</a>
    <?php }
    if($last_page > 25) { ?>
        <a href="index.php?page=<?= $last_page ?>">LAST PAGE</a> 
    <?php } ?>
</div>