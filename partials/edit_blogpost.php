<?php
$id = $_GET['id'];
require 'sql.php';
?>

<div class="insert-form">
    <h2>Edit your blog post here</h2>
    <form action="partials/edit_blogpost_sql.php?id=<?= $id ?>" method="POST">
    <div class="form-group">
            <div class="form-group__title">
                <label for="edit_title">Title:</label><br />
                <input type="text" class="form-control" name="edit_title" value="<?= $_GET['title'] ?>">
            </div>
            <div class="form-group__category">
                <label for="category">Choose category:</label><br />
                <select name="category">
                <?php foreach($category as $categories):?>
                     <!-- Make the original category as default? -->
                    <option value="<?= $categories['id']?>"><?= $categories['title']?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <!-- /.form-group-collapse -->
   
    <textarea name="edit_text" id="editor"><?= $_GET['content']?></textarea>
        <script>
            ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        </script>
    <br/>
    <input type="submit" name="submit" value="Submit">
    <form>
</div>