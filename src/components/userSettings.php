<!DOCTYPE html>
<html lang="en">

  <body>
    <!-- User Settings Form -->
    <div id="user-settings-form">
      <h2>User Settings</h2>
      <form id="userSettingsForm" action="<?php echo SITEROOT . 'updateUserSettings/updateUserSettings.php'; ?>" method="post" enctype="multipart/form-data">
        <label for="edit-username">Edit Username:</label>
        <input type="text" id="edit-username" name="edit-username" placeholder="Enter new username">
        <br>
        <label for="edit-password">Edit Password:</label>
        <input type="password" id="edit-password" name="edit-password" placeholder="Enter new password">
        <br>
        <label for="edit-email">Edit Email:</label>
        <input type="email" id="edit-email" name="edit-email" placeholder="Enter new email">
        <br>
        <label for="edit-pfp">Edit Profile Picture:</label>
        <input type="file" id="edit-pfp" name="edit-pfp" accept="image/png, image/jpeg" />
        <br>
        <!-- Display the current profile picture -->
        <img src="<?php echo SITEROOT . 'src/public/images/profiles/' . $profilePicture; ?>" alt="Current Profile Picture">
        <br>
        <input type="submit" value="Submit User Changes">
      </form>
    </div>
  </body>
</html>
