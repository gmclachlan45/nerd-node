<?php
include_once "renderProfilePicture.php";
function renderPost($post) {
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
        <div>
            <a href='".SITEROOT."report'> Report user</a>
        </div>
    </div>
</div>";
}
?>
