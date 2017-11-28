<div class="insert-form">
    <div class="go-back">
        <a href="profile.php#scroll">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    <?php 
    if(isset($_GET['newpost'], $_GET['error'])) { ?>
        <p class="error-message">Error: All fields are required for submission.</p>
   <?php }
   //check if alt-text is empty when image is not empty 
   if(isset($_POST['newpost_submit'])):
        if(!empty($_FILES['image']) && empty($_POST['alt_text'])): ?>
            <p class="error-message">Error: Enter an image text</p>
        <?php
        endif;
   endif;
   if(isset($_POST['newpost_submit'])):
     // If blog post with image is posted
     if (!empty($_FILES["image"]) && !empty($_POST["alt_text"])):
        require "actions/upload_image_sql.php";
        if(is_array($upload_ok) && !empty($upload_ok)):
            foreach ($upload_ok as $error_message):?>
            <p class="error-message"><?= $error_message ?><br/></p>
            <?php endforeach;
            endif;
        endif;
    endif; ?>

    <div class="center-heading"><h1>Write a new blog post</h1></div>
    <form action="profile.php?newpost=true" method="POST"
       enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group__title">
                <label for="title">Title:</label><br />
                <input type="text" class="form-control" name="blog_title">
            </div>
            <div class="form-group__category">
                <label for="category">Choose category:</label><br />
                <select name="category">
                <?php foreach($categories as $category):?>
                    <option value="<?= $category['id']?>"><?= $category['title']?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <!-- /.form-group-collapse -->
        
        <textarea name="post_text" id="editor"></textarea>
        <script>
            ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        </script>
        <input type="hidden" value="<?= $_SESSION['id']?>" name="user_id">
        <div class="form-group">
        <div class="form-group__title">
            <label for="upload_image">Choose image:</label><br />
            <input type="file" name="image">
        </div><!--/.form-group__title-collapse-->
        <div class="form-group__category">
            <label for="alt_text">Image text:</label><br />
            <input type="text" name="alt_text" placeholder="Write something about your image..">
        </div><!--/.form-group__category-collapse-->
    </div><!--/.form-group-collapse-->
    <input type="submit" name="newpost_submit" value="Submit">
    </form>
</div>
<!-- /.insert-form-collapse -->