<?php
include_once "../../config.php";
session_start();
if(! isset($_SESSION["sessionId"]) || $_SESSION["sessionUsername"] != "admin") {
    header('Location: '.SITEROOT);
}

include_once "loadCommentReports.php";
include_once "loadPostReports.php";
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
        <link rel="stylesheet" href="../public/font/hack.css">
    </head>
    <body>
	    <header>

            <?php
            $url = "/ADMIN";
            include "../components/headerBar.php";
            ?>
        </header>

        <main>
            <div class="center">
                <h2> Post Reports</h2>
                <?php
                if($postReports) {
                    foreach($postReports as $report) {
                        echo "<div class ='adminReport' id='post-".$report['id']."'>
<h2>".$report['author']."'s Post:</h2><p>
                ".$report['content']."
</p>

<div class='reportBar'>
        <div class='spacer'></div>
        <div class='dis' onclick='dismissPost(".$report['id'].", 5)'> Dismiss Report </div>
        <div class='spacer'></div>
        <div class='del' onclick='deletePost(".$report['id'].", 2)'> Delete Post </div>
        <div class='spacer'></div>
</div>

                        </div>";
                    }
                } else {
                    echo "<div style='text-align:center; width:100%;font-size: 1em;' >No Current Post Reports!</div>";
                }
                ?>

            </div>
            <div class="center">
                <h2> Comment Reports</h2>
                <?php
                if($commentReports){
                    foreach($commentReports as $report) {
                        echo "<div class ='adminReport' id='comment-".$report['id']."'>
<h2>".$report['author']."'s Comment:</h2><p>
                ".$report['content']."
</p>

<div class='reportBar'>
        <div class='spacer'></div>
        <div class='dis' onclick='dismissComment(".$report['id'].", 5)'> Dismiss Report </div>
        <div class='spacer'></div>
        <div class='del' onclick='deleteComment(".$report['id'].", 2)'> Delete Comment </div>
        <div class='spacer'></div>
</div>

                        </div>";
                    }
                } else {
                    echo "<div style='text-align:center; width:100%;font-size: 1em;' >No Current Post Reports!</div>";
                }
                ?>

            </div>

            </div>
	    </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
<script src="index.js"></script>
