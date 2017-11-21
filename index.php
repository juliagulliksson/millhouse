<?php
require 'partials/head.php';
?>
<main>
    <?php
    // Startpage blog posts
    if(!isset($_GET['id']) && !isset($_GET['category']) 
    && !isset($_GET['asc']) 
    && !isset($_GET['month'])):
        foreach ($articles as $article):
            include 'partials/blog_posts.php';
        endforeach;
    endif;

    // Individual blog posts
    if(isset($_GET['id'])):
        require 'partials/article_singles.php';
    endif; //END OF GET ID IF 

    if(isset($_GET['category']) && !isset($_GET['asc'])):
        $categories = $_GET['category'];
        include 'actions/category_articles.php';  


    if (count($category_articles) > 1):
    ?>  
        <h4>Sort by date | <a name="newest" href="index.php?category=<?= $categories?>
        &asc=true#oldest">Oldest</a></h4>
        
    <?php 
    endif;//End of count category_articles if

    foreach($category_articles as $article):
        include 'partials/blog_posts.php';    
    endforeach;       

        
    elseif(isset($_GET['category']) && isset($_GET['asc'])): //ascending categories
        $categories = $_GET['category'];
        include 'partials/category_articles.php';
        ?>

    <h4>Sort by date | <a name="oldest" href="index.php?category=<?= $categories?>
    #newest">Newest</a></h4>

        <?php
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

            if(isset($_GET['month'])):
                $month = $_GET['month'];
                include 'partials/month_articles.php';
                
                foreach($month_articles as $article):
                    include 'partials/blog_posts.php';
                endforeach; 
            endif; //END OF MONTHS 
            
            if(!isset($_GET['id']) && !isset($_GET['category']) 
            && !isset($_GET['asc']) 
            && !isset($_GET['month'])):
               include 'partials/pagination_links.php'; 
            endif;
              
            
            ?>
        </main>

        <aside>
            <?php require 'partials/aside.php'; ?>
        </aside>

<?php require 'partials/footer.php'; ?>