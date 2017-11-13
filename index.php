
<?php

require 'partials/sql.php';

      
require 'partials/functions.php';
require 'partials/head.php';
$today = date('Y-n-j');

?>

  <div class="wrapper">

  <main>
  <?php
    if(!isset($_GET['id']) && !isset($_GET['category']) 
    && !isset($_GET['asc']) 
    && !isset($_GET['month'])):
       foreach ($articles as $article):
        include 'partials/blog_posts.php';
        ?>
       <?php endforeach;
        endif;
       ?>

    <?php
    if(isset($_GET['id'])):
    ?>

        <a href="index.php" class="comments-count">Go back</a>
        <?php
        $id = $_GET['id'];

        //require SQL-queries
        require 'partials/function_article.php';
            
        foreach ($article_single as $article):
        ?>
        <div class="blog-posts">
            <article>
                <h1><?= $article['post_title']; ?></h1>
                <h3>Category: <?= $article['title']; ?></h3>
                <h3>Writer: <?= $article['username'] ?></h3>
                <h3><?= replace_date($article['date']) ?></h3>
                <p><?= nl2br($article['text']) ?></p> <?php //replace n/ with <br> ?>
                
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
       </div>

       <?php endforeach; ?>
    
       <h2>Comments:</h2>
            <?php
        //includes function_article.php where $comments is made
        foreach($comments as $comment): 
            ?>
                <div class="comments-box">
                    <h3>Comment created by: <?= $comment['username']?></h3>
                    <p>On <?= replace_date($comment['date']) ?> </p>
                    <p><?= $comment['text']?> </p>
            </div>
        <?php endforeach; ?>

    <?php endif; //END OF GET ID IF ?>

    <?php
    if(isset($_GET['category']) && !isset($_GET['asc'])):
        $categories = $_GET['category'];
        include 'partials/category_articles.php';  
   ?>  
        <a href="index.php?category=<?= $categories?>&asc=true">Order by oldest</a>

        <?php foreach($category_articles as $article):
            include 'partials/blog_posts.php';
        ?>
        <?php endforeach; ?>        
            
    <?php elseif(isset($_GET['category']) && isset($_GET['asc'])):
        $categories = $_GET['category'];
        include 'partials/category_articles.php';
        ?>
        <a href="index.php?category=<?= $categories?>">Order by newest</a>
        <?php
        foreach($category_articles_asc as $article):
        include 'partials/blog_posts.php';
    ?>

        <?php endforeach; ?>
<?php endif; //END OF CATEGORIES ?>

<?php
if(isset($_GET['month'])):
    $month = $_GET['month'];
    include 'partials/month_articles.php';
    ?>
    
    <?php
    foreach($month_articles as $article):
    include 'partials/blog_posts.php';
?>

    <?php endforeach; ?>


<?php endif; //END OF MONTHS ?>


       <div class="insert-form">
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
   </main>

        <aside>
            <h2>Log in</h2>
          <form>
              <input type="text" name="title">
              <br>             
              <input type="text" name="createdBy">
              <br>
            <input class="button" type="submit" value="Skicka" />
               
          </form>

          <h3>Categories:</h3>
            <?php
            foreach ($category as $categories):
                ?>
               
                <div class="categories-list">
                    <ul>
                        <li><a href="index.php?category=<?= $categories['id']?>"><?= $categories['title'] ?></a></li>
                    </ul>
                </div>
            <?php endforeach; ?>

            <h3>Sort by months</h3>

            <?php
            foreach ($month_number as $months):
                $month = $months['month'];
                ?>
               
                <div class="categories-list">
                    <ul>
                        <li><a href="index.php?month=<?= $months['month']?>"><?= replace_month($month) ?></a></li>
                    </ul>
                </div>
            <?php endforeach; ?>

            


          
           
        </aside>
    </div> 

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous">
    </script>
</body>
</html>