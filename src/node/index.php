<?php
include_once "../../config.php";
session_start();
$sku = $_GET['title'];
include_once "loadPost.php";
include_once "renderComments.php";
include_once "../renderProfilePicture.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <title>
            Nerd Node
	    </title>
	    <link rel="stylesheet" href="../public/css/reset.css">
	    <link rel="stylesheet" href="../public/css/home.css">
        <link rel="stylesheet" href="../public/css/node.css">
        <link rel="stylesheet" href="../public/font/hack.css">
    </head>
    <body>
	    <header>
            <?php
            $u =strlen($post["sku"]) >12 ? trim(substr($post["sku"], 0, 12)).'...' : $post["sku"];
            $url = "/NODE/$u";
            include "../components/headerBar.php";
            ?>
        </header>

        <main>
            <div class="center">
                <div class="post">
                    <?php renderProfilePicture($post['author'], $post['pfp']); ?>
                    <h3>
                        <?php echo $post["title"];?>
                    </h3>
                    <p>
                        <?php
                        echo "<a href='".SITEROOT."nerd?username=".$post["author"]."'>".$post["author"]."</a>";
                        ?>
                    </p>
                    <p>
                        <?php echo $post["content"]; ?>
                    </p>
                    <div class="interactionBar">
                        <div> &uarr; </div>
                        <div> <?php echo $post["likes"]; ?> </div>
                        <div> &darr; </div>
                        <div class="spacer"> </div>
                        <div> Report this user </div>
                    </div>
                </div>

                <div id="comments">
                    <div id="reply">

                        <?php
                        if(isset($_SESSION["sessionId"])) {
                            include "../components/commentForm.php";
                        } else {
                            echo "<p> <a href='".SITEROOT."login'>Log in</a> to leave a reply to this post!</p>";
                        }
                        ?>
                    </div>
                    <?php
                    if($comments) {
                        foreach($comments as $comment) {
                            renderComment($comment, $sku, isset($_SESSION["isAdmin"]));
                        }
                    } else {
                        echo "<div class=\"comment center\"><p>Be the first to comment!</p></div>";
                    }
                    ?>

                </div>
            </div>
            <?php include "../components/sidebar.php" ?>
	    </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
