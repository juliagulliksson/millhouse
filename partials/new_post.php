<div class="insert-form">
    <h2>Write a new blog post:</h2>
    <form action="partials/insert.php" method="POST">


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" placeholder="Type your title here" class="form-control" name="blog_title">
        </div>

        <label for="category">Choose category: </label><br />

        <select name="category">
                     <?php foreach($category as $categories):?>
                        <option value="<?= $categories['id']?>"><?= $categories['title']?></option>
                    <?php endforeach; ?>
                    </select>
        <br /><br />

        <textarea name="post_text" id="editor">



    </textarea>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });

        </script>


        <br />





        <input type="hidden" value="<?= $today ?>" name="date">
        <input type="submit" value="Submit">
    </form>
</div>
<!-- /.insert-form-collapse -->
