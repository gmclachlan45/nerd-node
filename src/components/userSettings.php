 <!DOCTYPE html>
 <html lang="en">
<!-- User Settings Form -->
 <div id="user-settings-form">
    <h2>User Settings</h2>
    <form action="http://www.randyconnolly.com/tests/process.php" method="post">
      <label for="edit-username">Edit Username:</label>
      <input type="text" id="edit-username" name="edit-username" placeholder="Enter new username">
      <br>
      <label for="edit-password">Edit Password:</label>
      <input type="password" id="edit-password" name="edit-password" placeholder="Enter new password">
      <br>
      <label for="edit-email">Edit Email:</label>
      <input type="email" id="edit-email" name="edit-email" placeholder="Enter new email">
      <br>
      <label for="edit-visibility">Edit Visibility:</label>
      <select id="edit-visibility" name="edit-visibility">
        <option value="public">Public</option>
        <option value="private">Private</option>
      </select>
      <br>
      <input type="submit" value="Submit User Changes">
    </form>
  </div>
 </html>