<?php
require 'partials/head.php';

$today = date('Y-n-j');

?>

<div class="wrapper">
    <div class="container">
        <main>
        <?php
            //Startpage blog posts
            if(!isset($_GET['id']) && !isset($_GET['category']) 
            && !isset($_GET['asc']) 
            && !isset($_GET['month'])):
                foreach ($articles as $article):
                include 'partials/blog_posts.php';
                endforeach;
            endif;
        
            //individual blog posts
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
                <div class="comment-field">
                    <h3>Comment the blog post here:</h3>
                    <form action="partials/comment_insert.php?post_id=<?= $article['postID']?>" method="POST">
                        <input type="hidden" value=<?= $article['user_id'] ?> name="user_id">
                        <input type="hidden" value="<?= $today ?>" name="date">
                        <textarea name="comment" placeholder="Type your comment"></textarea>
                        <input type="submit" name="comment_submit" value="Comment">
                    </form>
                </div>
                <!-- /.comment-field-collapse -->
            </div>
            <!-- /.blog_post-collapse -->
            

                <?php endforeach; ?>
        
                <h2>Comments:</h2>
                <?php
                    //function_article.php is where $comments is made
                    foreach($comments as $comment): 
                ?>
                <div class="comments-box">
                    <h3>Comment created by: <?= $comment['username']?></h3>
                    <p>On <?= replace_date($comment['date']) ?> </p>
                    <p><?= $comment['text']?> </p>
                </div>
                <!-- /.comments-box-collapse -->
            <?php 
            endforeach; 

            endif; //END OF GET ID IF 

            if(isset($_GET['category']) && !isset($_GET['asc'])):
                $categories = $_GET['category'];
                include 'partials/category_articles.php';  
            ?>  

            <a href="index.php?category=<?= $categories?>&asc=true">Order by oldest</a>

            <?php foreach($category_articles as $article):
                include 'partials/blog_posts.php';
            
            endforeach;       
                
            elseif(isset($_GET['category']) && isset($_GET['asc'])):
            $categories = $_GET['category'];
            include 'partials/category_articles.php';
            ?>
            <a href="index.php?category=<?= $categories?>">Order by newest</a>
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


            endif; //END OF MONTHS ?>


            <div class="insert-form">
                <h2>Write a new blog post:</h2>
                <form action="partials/insert.php" method="POST">
                    <input type="text" placeholder="Type your title here" name="blog_title">
                    <label for="category">Choose category: </label>
                    <select name="category">
                    <?php foreach($category as $categories):?>
                        <option value="<?= $categories['id']?>"><?= $categories['title']?></option>
                    <?php endforeach; ?>
                    </select>
                    <textarea name="post_text" placeholder="Type your blog post here"></textarea>
                    <input type="hidden" value="<?= $today ?>" name="date">
                    <input type="submit" value="Submit">
                </form>
            </div>
            <!-- /.insert-form-collapse -->
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
                        <li><a href="index.php?month=<?= $months['month']?>"><?= replace_month($month) ?></a></li>
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