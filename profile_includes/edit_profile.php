<div class="edit-account">
    <h1>Edit profile</h1>
    <p>Not happy with your username or profile photo? Feel happy to make changes.</p>
    <form action="">
        <label for="new_profile_photo">Upload new profile photo:</label>
        <input type="file" name="new_profile_photo" id="">
        <br />
        <label for="new_username">Change username:</label>
        <br />
        <input name="new_username" id="new_username" type="text" placeholder="New username">
        <br />
        <label for="new_password">Change password:</label>
        <br/ >
        <input name="new_password" id="new_password" type="text" placeholder="New password">
        <br />
        <label for="verify_new_password" class="visuallyhidden">Verify new password:</label>
        <br />
        <input name="verify_new_password" id="verify_new_password" type="text" placeholder="Verify new password">
        <br />
        <input type="submit" value="Save Profile Settings">
    </form>
    <h2>
        <a href="profile.php#scroll">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> No, I'm happy as it is. Take me back!
        </a>
    </h2>        
</div>