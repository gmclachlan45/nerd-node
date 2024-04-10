<?php
include_once "../../config.php";
session_start();
if(! isset($_SESSION["sessionId"]) || $_SESSION["sessionUsername"] != "admin") {
    header('Location: '.SITEROOT);
}

include_once "loadCommentReports.php";
include_once "loadPostReports.php";
include_once "loadDisabledUsers.php";
include_once "loadStats.php";
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
                <div>
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
                <div>
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
                        echo "<div style='text-align:center; width:100%;font-size: 1em;' >No Current Comment Reports!</div>";
                    }
                    ?>

                </div>
            </div>
            <div class="center">
                <h2 class=""> Today's Stats </h2>
                <div class="tab adminReport">
                    <table>
                        <tr><th>Total Users</th>   <td> <?php echo $stats['userCount']; ?></td></tr>
                        <tr><th>Total Posts</th>   <td> <?php echo $stats['postCount']; ?></td></tr>
                        <tr><th>Total Post Likes</th><td> <?php echo $stats['postLikeCount']; ?></td></tr>
                        <tr><th>Total Comments</th>  <td> <?php echo $stats['commentCount']; ?></td></tr>
                        <tr><th>Total Comment Likes</th>   <td> <?php echo $stats['commentLikeCount']; ?></td></tr>
                    </table>
                </div>
                <h2>Disabled Users</h2>
                <?php
                if($disabledUsers){
                    foreach($disabledUsers as $u) {

                        echo "<div class ='adminReport' id='comment-".$u['id']."'>
<h2>".$u['username']."
<img src='".SITEROOT."public/images/profiles/".$u['pfp']."' alt='".$u['username']."\'s profile picture' width='50' height='50' style='float:right;'>
<a href='".SITEROOT."nerd/?username=".$u['username']."'> Visit Page </a>
</h2>";

                        echo"</div>";
                    }
                } else {
                    echo "<div style='text-align:center; width:100%;font-size: 1em;' >No Disabled Users!</div>";
                    }
                ?>


            </div>
	    </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
<script src="index.js"></script>
