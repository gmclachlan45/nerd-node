<?php
include_once "renderProfilePicture.php";
function renderPost($post, $isAdmin, $addTag) {
    $username = $post['author'];
    $commentText = $post['commentCount'] ? "Leave a comment (".$post['commentCount'].")" : "Be the first to comment";

    $tags = $post['tags'][0] ?? "NAN";

    echo "<div class=\"post\">";
    renderProfilePicture($username, $post['pfp']);
    if($addTag) {
        echo "<a href='".SITEROOT."?tag=".$tags."' class='tags'>".$tags."</a>"; // Display the tags
    }
    echo "<h3>
            <a href='".SITEROOT."node?title=".$post['sku']."'>".$post['title']."</a>
    </h3>
    <p>";

    echo "<a href='".SITEROOT."nerd?username=".$username."'>".$username."</a>
    </p>
    <p>".$post['content']."
    </p>
    <div class='interactionBar'>
        <div class='arrow' onclick='upvote(".$post['id'].", 5)'> &uarr; </div>
        <div id='post-".$post['id']."'>".$post['likes']." </div>
        <div class='arrow' onclick='downvote(".$post['id'].", 2)'> &darr; </div>
        <div>
            <a href='".SITEROOT."node?title=".$post['sku']."'>".$commentText."</a>
        </div>
        <div class='spacer'></div>";

    if(isset($_SESSION['sessionUserId'])){

        if(!$isAdmin)
            echo "<div class='report' id='rep-".$post['id']."' onclick='report(".$post['id'].", 2)'> Report comment</div>";
        else
            echo "<form name='commentForm' action='deleteItem.php' method='post'>
        <input type='hidden' id='id' name='id' value='".$post["id"]."'>
        <input type='hidden' id='reporter' name='reporter' value='".$_SESSION['sessionUserId']."'>
        <input type='hidden' id='table' name='table' value='post'>
        <input type='submit' id='delete' value='DELETE POST'>
        </form>";
    }
    echo "</div></div>";

}
?>
<style>
 .post {
     position: relative;
 }

 .tags {
     float:right;

     right: 0.1em;
 }

 .pfp {
     position: relative;
     width: 50px;
     bottom: 15px;
 }
</style>
