<?php
session_start();
include_once "../config.php";
include_once "loadPosts.php";
include_once "renderPosts.php";
include_once "renderProfilePicture.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Nerd Node
        </title>
        <link rel="stylesheet" href="public/css/reset.css">
        <link rel="stylesheet" href="public/css/home.css">
        <link rel="stylesheet" href="public/font/hack.css">
    </head>
    <body>
        <header>
            <?php include "components/headerBar.php"; ?>
        </header>

        <main>
            <div class="center">
                <div class="searchBar">
                    <form>
                        <select id="tag" name="tag">
                            <option value="">Filter Posts</option>
                            <option value="all">All Posts</option>
                            <option value="help">Help</option>
                            <option value="question">Question</option>
                            <option value="answer">Answer</option>
                            <option value="discussion">Discussion</option>
                        </select>
                        <?php if(isset($_GET['o'])) echo '<input type="hidden" id="custId" name="o" value="'.$_GET['o'].'">';?>
                        <input type="submit" id="submit">
                    </form>
                    <div class="spacer">
                    </div>
                    <div class="sorter">
                        <ul>
                            <li>Sort by:</li>
                            <li>
                                <a href="<?php echo SITEROOT;?>?o=recent" id="sortedBy">Recent</a>
                            </li>
                            <li>
                                <a href="<?php echo SITEROOT;?>?o=hot">Hot</a>
                            </li>
                            <li>
                                <a href="<?php echo SITEROOT;?>?o=comments">Most Comments</a>
                            </li>
                        </ul>
                    </div>
                </div>
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
            </div>
            <?php include "components/sidebar.php"; ?>
            </div>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>
<script src="index.js"></script>