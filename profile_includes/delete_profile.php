<div class="delete-account">
        <h3><i class="fa fa-frown-o" aria-hidden="true"></i></h3>
        <h1>Are you sure you want to delete your account?</h1>
        <p>Deleting your account will also delete all your comments and blogposts.
        <br />No take backsies.</p>
        <h2>
            <a href="profile.php">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                No, please! Take me back!
            </a>
        </h2>
        <a class="delete" href="actions/delete_account.php?id=<?= $_SESSION['id']?>">
        Delete account</a>          
</div>