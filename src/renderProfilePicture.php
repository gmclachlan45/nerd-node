<?php
function renderProfilePicture($username, $picture) {
    echo "<img class='pfp' src='".SITEROOT."public/images/profiles/$picture' alt='$username\'s profile picture' width='50' height='50'>";
}
?>
