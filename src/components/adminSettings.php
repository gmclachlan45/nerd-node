<!DOCTYPE html>
<html lang="en">
    <!-- Admin Settings Form -->
    <div id="admin-settings-form">
        <h2>Admin Settings</h2>
        <div class='adminSettings'>
            <?php
            if ($isDisabled)
                echo "<div class='enUser' onclick='enableUser(".$username.", 5)'> Enable User  </div>";
            else
                echo "<div class='disUser' onclick='disableUser(".$username.", 5)'> Disable User  </div>";

            echo "<div class='delUser' onclick='deleteUser(".$username.", 2)'> Delete User</div>";
            ?>
        </div>
    </div>
</html>
