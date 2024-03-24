<!DOCTYPE html>
<html lang="en">
    <form name="commentForm" action="addComment.php" method="post">
        <?php if(isset($_GET['reply-to'])) echo "Replying to post ".$_GET['reply-to'];?>
        <input type="hidden" id="originalPost" name="originalPost" value="<?php echo $post['id'];?>">
        <input type="hidden" id="author" name="author" value="<?php echo $_SESSION["sessionUserId"]??'';?>">
        <input type="textarea" id="content" name="content" placeholder="Write your reply here" value="<?php echo $_GET['search']??""; ?>">
        <?php if(isset($_GET['reply-to'])) echo '<input type="hidden" id="parentComment" name="parentComment" value="'.$_GET['reply-to'].'">';?>
        <input type="submit" id="submit">
    </form>
</html>
