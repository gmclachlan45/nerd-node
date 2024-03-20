 <!DOCTYPE html>
 <html lang="en">
<!-- Admin Settings Form -->
<div id="admin-settings-form">
    <h2>Admin Settings</h2>
    <form action="suspenduser.php" method="post">
      <label for="suspend-user">Suspend User:</label>
      <input type="text" id="suspend-user" name="suspend-user" placeholder="Enter username">
      <br>
      <label for="delete-user">Delete User:</label>
      <input type="text" id="delete-user" name="delete-user" placeholder="Enter username">
      <br>
      <input type="submit" value="Submit Admin Changes">
    </form>
  </div>
 </html>