<?php
if(isset($_GET['error'])): ?>
    <p class="error-message">Error: All fields are required for submission</p>
<?php
endif;

if(isset($_POST['editpost_submit'])):

    if(!empty($_FILES['edit_image']['name']) && empty($_POST['edit_alt_text'])): 
        ?>
            <p class="error-message">Error: Enter an image text</p>
        <?php
    endif;
    // If blog post with image is posted
    if (!empty($_FILES["edit_image"]) && !empty($_POST["edit_alt_text"])):
        if(is_array($upload_ok) && !empty($upload_ok)):
            foreach ($upload_ok as $error_message):?>
                <p class="error-message"><?= $error_message ?><br/></p>
            <?php endforeach;
        endif;//end of check if in array and not empty
    endif;//end of check if not empty
endif; //end of isset
?>