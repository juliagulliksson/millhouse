<?php
require 'partials/includes.php';
require 'partials/functions/check_image_before_upload.php';
require 'profile_includes/profile_if_statements.php';
require 'partials/head.php';
require 'profile_includes/profile_actions/profile_sql.php';
require 'partials/functions/split_email.php';

if(empty($_GET) || isset($_GET['update']) 
|| isset($_GET['pass'])):
    require 'profile_includes/main_profile.php'; //Main profile html
endif;// End of main get if

// Edit account
if(isset($_GET['edit'])): 
    require 'profile_includes/main_edit_profile.php';
endif; // End of edit if

// Delete account
if(isset($_GET['delete'])): 
    require 'profile_includes/delete_profile.php';
endif; // End of delete if

if(isset($_GET['newpost'])):
    require 'profile_includes/new_post.php';
endif; // End of newpost if

if(isset($_GET['editpost'])):
    require 'profile_includes/edit_blogpost.php';
endif;// End of editpost if

if(isset($_GET['editcomment'])):
    require 'profile_includes/edit_comment_profile.php';
endif;// End of editcomment if

require 'partials/footer.php';