<?php
if (isset($_SESSION['username']) 
&& $_SESSION['contributor'] == true 
&& !isset($_GET['id'])):
    ?> 
<div class="insert-form">
    <div class="center-heading"><h2>Write a new blog post</h2></div>
    <form action="actions/insert_blogpost.php" method="POST">
        <div class="form-group">
            <div class="form-group__title">
                <label for="title">Title:</label><br />
                <input type="text" class="form-control" name="blog_title">
            </div>
            <div class="form-group__category">
                <label for="category">Choose category:</label><br />
                <select name="category">
                <?php foreach($category as $categories):?>
                    <option value="<?= $categories['id']?>"><?= $categories['title']?></option>
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

        <input type="hidden" value="<?= $today ?>" name="date">
        <input type="hidden" value="<?= $_SESSION['id']?>" name="user_id">
        <input type="submit" value="Submit">
    </form>
</div>

<?php endif; ?>