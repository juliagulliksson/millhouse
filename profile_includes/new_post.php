<div class="insert-form">
    <div class="go-back">
        <a href="profile.php#scroll">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
        </a>
    </div>
    
    <?php require 'profile_includes/new_post_errors.php'; ?>
    
    <div class="center-heading"><h1>Write a new blog post</h1></div>
    <form action="profile.php?newpost=true" method="POST" 
    enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group__title">
                <label for="title">Title:</label><br />
                <input type="text" class="form-control" name="blog_title" id="blog_title"
                value="<?php if(isset($_POST['blog_title'])){
                    echo $_POST['blog_title'];
                    } ?>">
            </div>
            <div class="form-group__category">
                <label for="category">Choose category:</label><br />
                <select name="category" id="category">
                <?php foreach($categories as $category):?>
                    <option value="<?= $category['id']?>"><?= $category['title']?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <!-- /.form-group-collapse -->
        <textarea name="post_text" id="editor">
        <?php if(isset($_POST['post_text'])){ 
            echo $_POST['post_text'];} ?>
        </textarea>
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
            <input type="file" name="upload_image" id="upload_image">
        </div><!--/.form-group__title-collapse-->
        <div class="form-group__category">
            <label for="alt_text">Image text:</label><br />
            <input type="text" name="alt_text" id="alt_text" placeholder="Write something about your image..">
        </div><!--/.form-group__category-collapse-->
    </div><!--/.form-group-collapse-->
        <input type="submit" name="newpost_submit" value="Submit">
    </form>
</div>
<!-- /.insert-form-collapse -->