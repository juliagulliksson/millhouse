<div class="delete-account">
        <h3><i class="fa fa-frown-o" aria-hidden="true"></i></h3>
        <h1>Are you sure you want to delete this user's account?</h1>
        <p>Deleting this account will also delete all the comments and blogposts made by the user.
        <br />No take backsies.</p>
        <h2>
            <a href="profile.php#scroll">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                No, please! Take me back!
            </a>
        </h2>
        <a class="delete" href="actions/delete_account.php?id=<?= $_GET['uid'] ?>&admin=true">
        Delete account</a>          
</div>