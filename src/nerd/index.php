<?php
session_start();
$username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nerd Node</title>
        <link rel="stylesheet" type="text/css" href="./nerd css/nerduser.css">
        <link rel="stylesheet" href="../public/css/reset.css">
        <link rel="stylesheet" href="../public/css/home.css">
        <?php include_once "../../config.php";
        include_once "loadPosts.php";
        include_once "../renderPosts.php";
        ?>
    </head>
    <body>
        <header>
            <?php
            $url = "/NERD/$username";
            include "../components/headerBar.php";
            ?>
        </header>
	    <main>

		    <div id="posts">
			    <div class="form-header">
			        <div class="search-bar">
				        <span class="search-text">Graph.Search()</span>
				        <button class="search-button">GO!</button>
			        </div>
			        <div class="sort-by">
				        <div class="sort-container">
				            <p>Sort by:</p>
				            <nav id="navbar">
					            <ul>
					                <li><a href="#Recent">Recent</a></li>
					                <li><a href="#Hot">Hot</a></li>
					                <li><a href="#Most_Comments">Most Comments</a></li>
					            </ul>
				            </nav>
				        </div>
			        </div>
			    </div class="postserverside">
                <?php
                if($posts) {
                    foreach($posts as $post) {
                        renderPost($post, isset($_SESSION["isAdmin"]));
                    }
                } else {
                    echo "There are no posts available...";
                }
                ?>

	        </div>
            <div id="right-sidebar">
                <?php
                if(isset($_SESSION["sessionId"])) {
                    if($_SESSION["sessionUsername"] == "admin") {
                        include "../components/adminSettings.php";
                        include "../components/userSettings.php";
                    } else if ($_SESSION["sessionUsername"] == $username ) {
                        include "../components/userSettings.php";
                    } else {
                        // If not user or admin
                        include "../componenets/sidebar.php";
                    }
                } else {
                    // If not logged in
                    include "../components/sidebar.php";
                }
                ?>
            </div>
            </div>
        </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
<script src="index.js"></script>
