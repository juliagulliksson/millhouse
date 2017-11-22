<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" 
                    class="navbar-toggle collapsed"
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
        <!-- /.navbar-header-collapse -->     
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">BLOG</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li class="categories"><a href="#categories">CATEGORIES</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['signed_in'])): ?>
                <li class="profile-image">
                    <img src="images/profile_photo.jpg" Alt="Profile photo" />
                </li>
                <li class="navbar-text">
                    Logged in as <?= $_SESSION['username']?>
                </li>
                <li class="button nav-margin"><a href="profile.php#scroll">Profile</a></li>
                <li class="button"><a href="index.php?end_session=true">Log out</a></li>
                <?php else: ?>
                <li class="button nav-margin"><a href="login.php#scroll">Login</a></li>
                <li class="button"><a href="register.php#scroll">Register</a></li>
                </div>
                <!-- /.buttons-collapse -->
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

