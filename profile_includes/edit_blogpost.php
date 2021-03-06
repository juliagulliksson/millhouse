<?php
$post_id = $_GET['id'];
$categories_table = "categories";
$categories = fetch_all($categories_table);

$posts_table = "posts";
$column = "id";
// Fetch the original post
$edit_post = fetch_all_where_condition($posts_table, $column, $post_id);
?>

<div class="insert-form">
    <div class="go-back">
        <a href="index.php?id=<?= $post_id ?>#scroll">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
        </a>
    </div>
    
    <?php require 'profile_includes/edit_blogpost_errors.php'; ?>

    <h1>Edit blogpost</h1>
    <form action="profile.php?editpost=true&id=<?= $post_id ?>" method="POST" 
    enctype="multipart/form-data">
    <div class="form-group">
        <div class="form-group__title">
            <label for="edit_title">Title:</label><br />
            <input type="text" class="form-control" name="edit_title" id="edit_title"
            value="<?php if(isset($_POST['edit_title'])){
                echo $_POST['edit_title'];
            }else { 
                echo $edit_post['post_title']; } ?>">
        </div>
        <div class="form-group__category">
            <label for="category">Choose category:</label><br />
            <select name="category" id="category">
            <?php foreach($categories as $category): 
                if($edit_post['category_id'] == $category['id']){
                    $selected = 'selected="selected"'; 
                }else{
                    $selected = ''; 
                }
                echo "<option value='" . $category['id'] . "' $selected>" . $category['title'] ."</option>";
            endforeach; ?>
            </select>
        </div>
    </div>
    <!-- /.form-group-collapse -->
   
    <textarea name="edit_text" id="editor"><?php if(isset($_POST['edit_title'])){
                echo $_POST['edit_text'];
            }else { 
                echo $edit_post['text']; } ?></textarea>
    <script>
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>
    <br />  
    <div class="form-group">
        <div class="file-input">
            <?php if(!empty($edit_post['image'])): ?>
            <div class="form-image">
                <img src="partials/<?=$edit_post['image']?>" class="edit_blogpost" alt="Edit photo">
           </div>
            <?php endif; ?>
            <div class="form-group__file">
                <label for="edit_image">Choose new image:</label><br />
                <input type="file" name="edit_image" id="edit_image">
            </div>
            <!--/.form-group__file-collapse-->
        </div>
        <!--/.file-input-collapse-->
        <div class="form-group__alt_text">
            <label for="edit_alt_text">Image text:</label><br />
            <input type="text" name="edit_alt_text" id="edit_alt_text" value="<?=$edit_post['alt_text'] ?>">
        </div><!--/.form-group__alt_text-collapse-->
    </div><!--/.form-group-collapse-->
    <input type="submit" name="editpost_submit" value="Submit">
    </form>
</div>
<!-- /.insert-form-collapse -->