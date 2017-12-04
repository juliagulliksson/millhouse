        
        </div>
    </div> <!-- /.wrapper-collapse -->
    <footer role="contentinfo">
        <div class="footer-wrapper">
            <div class="footer-container">
                <div class="footer-logo">
                    <img src="images/millhouse-logo.png" Alt="Millhouse Logo" />
                </div>
                <div class="footer-margin">
                <ul>
                    <li><b>OUR SHOPS</b></li>
                    <?php foreach ($categories_disctinct as $category): ?>
                    <li>
                        <a href="index.php?category=<?= $category['id']?>#scroll"><?= $category['title'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                </div>
                <div class="footer-margin">
                    <ul>
                        <li><b>ABOUT MILLHOUSE</b></li>
                        <li><a href="about.php#press">Press</a></li>
                        <li><a href="about.php#sustainability">Sustainability</a></li>
                        <li><a href="about.php#investors">Investors</a></li>
                        <li><a href="about.php#jobs">Jobs</a></li>
                        <li><a href="about.php#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="social-media">
                    <ul>
                        <li><b>FOLLOW US</b></li>
                        <li><a href="http://www.instagram.com" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i> Instagram
                        </a></li>
                        <li><a href="http://www.facebook.com" target="_blank">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook
                        </a></li>
                        <li><a href="newsletter.php">
                            <i class="fa fa-envelope" aria-hidden="true"></i> Newsletter
                        </a></li>
                        <li><a href="http://www.youtube.com" target="_blank">
                            <i class="fa fa-youtube" aria-hidden="true"></i> YouTube
                        </a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-container-collapse -->
        </div>
        <!-- /.footer-wrapper-collapse -->
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous">
    </script>
</body>
</html>