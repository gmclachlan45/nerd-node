<?php
include_once "renderProfilePicture.php";
function renderComment($comment, $op, $isAdmin) {
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
    <div class='spacer'> </div>
    <div>
    <a href='".SITEROOT."node?title=".$op."&reply-to=".$comment['id']."' > Reply </a>
    </div>
&ensp;
    <div>";


    if(!$isAdmin)
        echo"<a href='".SITEROOT."report'> Report user</a>";
    else
        echo "<form name='commentForm' action='../deleteItem.php' method='post'>
        <input type='hidden' id='id' name='id' value='".$comment["id"]."'>
        <input type='hidden' id='reporter' name='reporter' value='".$_SESSION['sessionUserId']."'>
        <input type='hidden' id='table' name='table' value='comment'>
        <input type='submit' id='delete' value='DELETE COMMENT'>
    </form>";

    echo "</div>
    </div>
    </div>";
}
?>
