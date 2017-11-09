<?php

require 'partials/sql.php';
$today = date('Y-n-j');

       function replace_date($date){
            $source = $date;
            $date = new DateTime($source);
            return $date->format('F j, Y');
       }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Millhouse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.rawgit.com/tonsky/FiraCode/1.204/distr/fira_code.css">
  <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="shortcut icon" href="images/millhouse.ico">
</head>
<body>

    <header>
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                  <img src="images/millhouse-logo.png" Alt="Millhouse logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="login.php?mobile=true">LOGIN / REGISTER</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="header_pic_1">
<h3>An awesome and selling slogan</h3>

    </div>
  </header>

  <div class="wrapper">

  <main>
  <?php
    if(!isset($_GET['id'])):
       foreach ($articles as $article):
        ?>
        <div class="blog-posts">
            <article>
                <h1><?= $article['post_title']; ?></h1>
                <h3>Category: <?= $article['title']; ?></h3>
                <h3>Writer: <?= $article['username'] ?></h3>
                <h3><?= replace_date($article['date']) ?></h3>
                <p><?= nl2br($article['text']) ?></p> <?php //replace n/ with <br> ?>
                <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">Comments(<?= $article['comments']?>)</a>
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

       <?php endforeach;
        endif;
       ?>

       <?php
        if(isset($_GET['id'])):

            $id = $_GET['id'];

            $statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
            posts.text, posts.post_title, posts.date, categories.title, 
            users.username, users.id as user_id
            FROM posts 
            INNER JOIN categories 
            ON posts.category_id=categories.id
            INNER JOIN users
            ON posts.user_id=users.id
            WHERE posts.id = $id
              ");
              $statement->execute();
              $article_single = $statement->fetchAll(PDO::FETCH_ASSOC);

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
       $statement = $pdo->prepare("SELECT comments.text, comments.date, users.username
        FROM comments 
        INNER JOIN users
        ON comments.user_id=users.id
        WHERE comments.post_id=$id
        ORDER BY comments.id DESC
        ");
        $statement->execute();
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($comments as $comment): 

        
        
            ?>
                <div class="comments-box">
                    <h3>Comment created by: <?= $comment['username']?></h3>
                    <p>On <?= replace_date($comment['date']) ?> </p>
                    <p><?= $comment['text']?> </p>
            </div>
        <?php endforeach; ?>
        <?php endif; ?> <!-- END OF GET ID IF-->
       

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
           
        </aside>
    </div> 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous">
    </script>


<?php require 'partials/footer.php'; ?>

