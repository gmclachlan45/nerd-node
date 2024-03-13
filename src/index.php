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
        <?php include "loadPosts.php" ?>
        <?php include "renderPosts.php" ?>

    </head>
    <body>
	    <header>
            <div>
	            <h1>
		            Nerd_Node
	            </h1>
                <div id="life">
                </div>
            </div>
            <div class="navbar">
                <h1>
	                /Home
                </h1>
                <div class="spacer">
                </div>
                <div class="buttonBox">
		            <button id="newPost">Insert(node)</button>
		            <button id="login" onclick="location.href = 'register';">Login(self)</button>
                </div>
        </header>

        <main>
            <div class="center">
                <div class="searchBar">
	                <form>
                        <input type="text" id="query" name="search" placeholder="Graph.Search()">
                        <input type="submit" id="submit" name="search">
                    </form>
                    <div class="spacer">
                    </div>
                    <div class="sorter">
	                    <ul>
                            <li>Sort by:</li>
		                    <li>
		                        <a href="#Recent">Recent</a>
		                    </li>
		                    <li>
		                        <a href="#Hot" id="sortedBy">Hot</a>
		                    </li>
		                    <li>
		                        <a href="#Most_Comments">Most Comments</a>
		                    </li>
	                    </ul>
                    </div>
                </div>
                <?php
                if($posts) {
                    foreach($posts as $post) {
                        renderPost($post);
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
