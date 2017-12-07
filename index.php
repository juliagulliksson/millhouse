<?php
require 'partials/includes.php';

if(isset($_GET['id'])):
    require 'partials/404_GET_handlers.php';
endif;

require 'partials/head.php';
?>
<main role="main">
<?php
// Startpage blog posts
if(empty($_GET) || isset($_GET['end_session']) 
|| isset($_GET['page'])):
foreach ($articles as $article):
    include 'partials/blog_posts.php';
endforeach;
    include 'partials/pagination_links.php';
endif;

// Individual blog posts
if(isset($_GET['id'])):
    require 'partials/article_singles.php';
endif; //end of get id if

if(isset($_GET['category']) && !isset($_GET['asc'])):
    $category = $_GET['category'];
    include 'actions/category_articles.php';  
    if (count($category_articles) > 1): ?>  
        <h4 class="sort">
            Sort by date: 
            <b><a href="index.php?category=<?= $category ?>&asc=true#scroll">Oldest 
            <i class="fa fa-arrow-up" aria-hidden="true"></i></a></b>
        </h4>
    <?php endif;//End of count category_articles if

    foreach($category_articles as $article):
        include 'partials/blog_posts.php';    
    endforeach;       
    
elseif(isset($_GET['category']) && isset($_GET['asc'])): //ascending categories
    $category = $_GET['category'];
    include 'actions/category_articles.php'; 
    if (count($category_articles) > 1): ?>  
    <h4 class="sort">
        Sort by date: <b><a href="index.php?category=<?= $category ?>#scroll">Newest 
        <i class="fa fa-arrow-up" aria-hidden="true"></i></a></b>
    </h4>
    <?php endif;

    foreach($category_articles_asc as $article):
        include 'partials/blog_posts.php';
    endforeach; 
endif; //END OF CATEGORIES 

if(isset($_GET['month'])):
    $month = $_GET['month'];
    include 'actions/month_articles.php';
    foreach($month_articles as $article):
        include 'partials/blog_posts.php';
    endforeach; 
endif; //END OF MONTHS 

if(isset($_GET['upost']) || isset($_GET['uid'])): 
    require 'profile_includes/profile_blogposts.php';
endif;

if(isset($_GET['ucomments']) || isset($_GET['ucid'])):
    require 'profile_includes/profile_comments.php';
endif; ?>

</main>
<aside role="complementary">
    <?php require 'partials/aside.php'; ?>
</aside>
<?php require 'partials/footer.php'; ?>