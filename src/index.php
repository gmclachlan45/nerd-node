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
                for($i = 0; $i < 8; $i++) {
                    // in real site will be a for post in posts from db,
                    renderPost(['title' => "I AM A POST",
                                'author' => $i,
                                'sku' => 'i-am-a-post-'.$i,
                                'content' => "LOENUTHO ENHU OENTU HEONT HEONU THU notehunote hone tuhoe ntuho eathoaes thasnteou honet huonte huneot hueou oeuneou  ueo ueo ueonth ueoh nteoh unteoh ntuhoentuheo ntuheont huont hent",
                                'likes' => number_format(52474725742),
                                'commentCount' => $i*4
                    ]);
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
