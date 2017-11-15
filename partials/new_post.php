<?php
if (isset($_SESSION['username']) 
&& $_SESSION['contributor'] == true 
&& !isset($_GET['id'])):
    ?> 
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
    
        <textarea name="post_text" id="editor"></textarea>

        <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
               
            });
        </script>
        <input type="hidden" value="<?= $_SESSION["id"] ?>" name="user_id">
        <input type="submit" value="Submit">
    </form>
</div>
        <?php endif; ?>
<!-- /.insert-form-collapse -->
