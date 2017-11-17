<?php
require 'partials/head.php';

$today = date('Y-n-j');
?>

<div class="wrapper">
    <div class="container">
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
            ?>
                
            <a href="index.php" class="comments-count">Go back</a>
            <?php
            $id = $_GET['id'];

            //require SQL-queries
            require 'partials/function_article.php';
                    
            foreach ($article_single as $article):
            ?>

            <div class="blog_post">
                <article>
                    <h2><?= $article['post_title']; ?></h2>
                            
                    <h3> <?= replace_date($article['date']) ?> | <?= $article['username'] ?></h3>
                    <h3>Category: <?= $article['title']; ?></h3>
                        
                    <p><?= nl2br($article['text']) ?></p>
                            
                </article>
                <?php
            endforeach;
                 if(isset($_SESSION['username'])):
                ?>
                <div class="comment-field">
                    <h3>Comment the blog post here:</h3>
                    <form action="partials/comment_insert.php?post_id=<?= $article['postID']?>" method="POST">
                        <input type="hidden" value=<?= $_SESSION['id'] ?> name="user_id">
                        <input type="hidden" value="<?= $today ?>" name="date">
                        <textarea name="comment" placeholder="Type your comment"></textarea>
                        <br />
                        <input type="submit" name="comment_submit" value="Comment">
                </form>
                  
                </div>
                <!-- /.comment-field-collapse -->
            </div>
            <!-- /.blog_post-collapse -->
                
                <?php 
                    else:
                        echo "<b>Sign in to comment</b>";

                 endif; //end of isset username if
                  ?>
        
       
                <?php
            //function_article.php is where $comments is made
                if(count($comments) > 0):
                    ?>
                    <h2>Comments:</h2>
                    <?php
                    foreach($comments as $comment): 
                    ?>
                        <div class="comments-box">
                            <h3>Comment created by: <?= $comment['username']?></h3>
                            <p>On <?= replace_date($comment['date']) ?> </p>
                            <p><?= $comment['text']?> </p>
                        </div>
                    <!-- comments-box-collapse -->
                    <?php 
                    endforeach; 
                endif; //END OF count comments if
            endif; //END OF GET ID IF 

            if(isset($_GET['category']) && !isset($_GET['asc'])):
                $categories = $_GET['category'];
                include 'partials/category_articles.php';  
            

            if (count($category_articles) > 1):
            ?>  
                <h4>Sort by date | <a name="newest" href="index.php?category=<?= $categories?>&asc=true#oldest">Oldest</a></h4>
                
            <?php 
            endif;//End of count category_articles if

            foreach($category_articles as $article):
                include 'partials/blog_posts.php';    
            endforeach;       

                
            elseif(isset($_GET['category']) && isset($_GET['asc'])): //ascending categories
                $categories = $_GET['category'];
                include 'partials/category_articles.php';
                ?>

            <h4>Sort by date | <a name="oldest" href="index.php?category=<?= $categories?>#newest">Newest</a></h4>

                <?php
                foreach($category_articles_asc as $article):
                    include 'partials/blog_posts.php';
                endforeach; 
            endif; //END OF CATEGORIES 


            if(isset($_GET['month'])):
                $month = $_GET['month'];
                include 'partials/month_articles.php';
                
                foreach($month_articles as $article):
                    include 'partials/blog_posts.php';
                endforeach; 
            endif; //END OF MONTHS 
            
              ?>
        </main>

        <aside>
            <div class="sidebar">
                <h3>Categories:</h3>
                <div class="categories-list">
                    <ul>
                    <?php foreach ($category as $categories): ?>
                        <li>
                            <a href="index.php?category=<?= $categories['id']?>"><?= $categories['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /.categories-list-collapse -->
                
                <h3>Sort by months</h3>
                <div class="categories-list">
                    <ul>
                    <?php foreach ($month_number as $months):
                        $month = $months['month'];
                    ?>
                        <li>
                            <a href="index.php?month=<?= $months['month']?>"><?= replace_month($month) ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /. categories-list-collapse -->
            </div>
            <!-- /.sidebar-collapse -->
        </aside>
    </div> <!-- container end -->
</div> <!-- wrapper end -->

<?php require 'partials/footer.php'; ?>
