<?php
session_start();
include_once "../../config.php";

if(!isset($_SESSION["sessionId"])) {
    header('Location: '.SITEROOT);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Make Post</title>
        <link rel="stylesheet" href="makePost_css/makePost.css">
    </head>
    <body>
        <form id="postForm" action="makePost.php" method="post">
            <p> Create Your Post here </p>
            <input type="hidden" id="poster" name="poster" value="<?php echo $_SESSION["sessionUserId"]??'';?>">
            <input type="text" id="postTitle" name="postTitle" placeholder="Enter post title" required>
            <textarea id="postContent" name="postContent" placeholder="Write your post here" required></textarea>
            <input type="submit" id="submit">
        </form>
    </body>
</html>
