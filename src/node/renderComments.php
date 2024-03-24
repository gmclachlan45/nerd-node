<?php
include_once "renderProfilePicture.php";
function renderComment($comment, $op) {
    $username = $comment['author'];


    echo "<div class=\"comment\" id=\"".$comment['id']."\">";
    renderProfilePicture($username, $comment['pfp']);
    echo "<p>
            <a href='".SITEROOT."nerd?username=".$username."'>".$username."</a>";
    if($comment['parentId']) {
        echo " ---- <a href='#".$comment['parentId']."'> Replying to:</a> ".$comment['parentContent'];
    }
    echo "</p>";

    echo"<p>

    </p>
    <p>".$comment['content']."
    </p>
    <div class='interactionBar'>
    <div> &uarr; </div>
    <div>".$comment['likes']." </div>
    <div> &darr; </div>
    <div>
    <a href='".SITEROOT."node/makeComment?replyto=".$comment['id']."'> Reply </a>
    </div>
    <div class='spacer'> </div>
    <div>
    <a href='".SITEROOT."node?title=".$op."&reply-to=".$comment['id']."' > Reply </a>
    </div>
&ensp;
    <div>
    <a href='".SITEROOT."report'> Report Comment</a>
    </div>
    </div>
    </div>";
}
?>
