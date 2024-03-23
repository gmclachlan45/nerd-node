<?php
function renderComment($comment) {
    $username = $comment['author'];

    echo "<div class=\"comment\" id=\"".$comment['id']."\">
    <p>
            <a href='".SITEROOT."nerd?username=".$username."'>".$username."</a>";
    if($comment['parentId']) {
        echo " ---- <a href='#".$comment['parentId']."'> Replying to:</a> ".$comment['parentContent'];
    }
    echo "</p>
    <p>

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
            <a href='".SITEROOT."report'> Report Comment</a>
        </div>
        </div>
        </div>";
    }
?>
