<?php
include_once "../../config.php";
session_start();
$sku = $_GET['title'];
include_once "loadPost.php";
include_once "renderComments.php";
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
            <?php include "../components/headerBar.php"; ?>
            <!--
                 <div>
	             <h1>
		         Nerd_Node
	             </h1>
                 <div id="life">
                 </div>
                 </div>
                 <div class="navbar">
                 <h1>
	             /Node/<?php echo strlen($post["sku"]) >12 ? trim(substr($post["sku"], 0, 12)).'...' : $post["sku"]; ?>
                 </h1>
                 <div class="spacer">
                 </div>
                 <div class="buttonBox">
		         <button id="newPost">Insert(node)</button>
		         <button id="login" onclick="location.href = 'register';">Login(self)</button>
                 </div>
            -->
        </header>

        <main>
            <div class="center">
                <div class="post">
                    <h3>
                        <?php echo $post["title"];?>
                    </h3>
                    <p>
                        <?php echo $post["author"]; ?>
                    </p>
                    <p>
                        <?php echo $post["content"]; ?>
                    </p>
                    <div class="interactionBar">
                        <div> &uarr; </div>
                        <div> <?php echo number_format($popularity); ?> </div>
                        <div> &darr; </div>

                        <div class="spacer"> </div>
                        <div> Report this user </div>
                    </div>
                </div>

                <div id="comments">

                    <div id="reply">
                        <form>
                            leave a reply :)

                        </form>

                    </div>
                    <?php
                    if($comments) {
                        foreach($comments as $comment) {
                            renderComment($comment);
                        }
                    } else {
                        echo "Be the first to comment!";
                    }
                    ?>

                </div>
            </div>
            <?php include "../components/sidebar.php" ?>
	    </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
