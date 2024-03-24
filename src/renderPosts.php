<?php
include_once "renderProfilePicture.php";
function renderPost($post, $isAdmin) {
    $username = $post['author'];
    $commentText = $post['commentCount'] ? "Leave a comment (".$post['commentCount'].")" : "Be the first to comment";

    echo "<div class=\"post\">";
    renderProfilePicture($username, $post['pfp']);
    echo "<h3>
            <a href='".SITEROOT."node?title=".$post['sku']."'>".$post['title']."</a>
    </h3>
    <p>";

    echo "<a href='".SITEROOT."nerd?username=".$username."'>".$username."</a>
    </p>
    <p>".$post['content']."
    </p>
    <div class='interactionBar'>
        <div> &uarr; </div>
        <div>".$post['likes']." </div>
        <div> &darr; </div>
        <div>
            <a href='".SITEROOT."node?title=".$post['sku']."'>".$commentText."</a>
        </div>
        <div class='spacer'> </div>
        <div>";

    if(!$isAdmin)
        echo"<a href='".SITEROOT."report'> Report user</a>";
    else
        echo "<form name='commentForm' action='deleteItem.php' method='post'>
        <input type='hidden' id='id' name='id' value='".$post["id"]."'>
        <input type='hidden' id='reporter' name='reporter' value='".$_SESSION['sessionUserId']."'>
        <input type='hidden' id='table' name='table' value='post'>
        <input type='submit' id='delete' value='DELETE POST'>
    </form>";

    echo"</div>
    </div>
    </div>";
}
?>
