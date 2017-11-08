<?php

require 'partials/sql.php';
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

       foreach ($articles as $article):
        ?>
        <article>
            <h2><?= $article['post_title']; ?></h2>
            <h3>Category: <?= $article['title']; ?></h3>
            <h3>Writer: <?= $article['username'] ?></h3>
            <h3><?= $article['date'] ?></h3>
            <p><?= $article['text'] ?></p>
       </article>

       <?php endforeach; ?>

       <div class="insert-form">
       <?php $today= date('Y-n-j')?>

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

