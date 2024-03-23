<?php
session_start();
include_once "../../config.php";
include_once "../renderProfilePicture.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <title>
            Nerd Node
	    </title>
	    <link rel="stylesheet" href="/public/css/reset.css">
	    <link rel="stylesheet" href="/public/css/home.css">
        <link rel="stylesheet" href="/public/font/hack.css">
    </head>
    <body>
	    <header>
            <?php
            $url="/ABOUT";
            include "../components/headerBar.php";
            ?>
        </header>

        <main>
            <div class="center">
                <h2 id="who"> Who are we? </h3>
                <p> We are a small group of university undergraduates with a common goal of doing well in our COSC 360 -- Web Programming course. Under the combined effort of Gabriel, Herman and Sawneet, we are building a hyperfocused web platform to further fragment and decentralize any possible useful information available. </p>
                <h2 id="what"> What is NERD_NODE? </h3>
                <p> NERD_NODE is a social media website made for the discussion of computer science topics. Anything from  algorithms to AI, all discussion and discourse is encouraged.</p>
                <h2 id="why"> Why did we rip off <a href="https://www.reddit.com/"> Reddit.com</a>?</h3>
                    <p> Of the three choices that we were given to base our website off of, the founders of NERD_NODE only had heard of Reddit and HackerNews. With this vague familiarity, we we decided to give our own *cough* interpretation on the Reddit format. The rest is history. </p>
                    <p> Thanks for reading. Live long and Nerd on! </p>
                    <img src="../favicon.ico" width="full" alt="Literally me." style="display:block; margin-left:auto; margin-right:auto" />
            </div>
            </div>
            <?php include "../components/sidebar.php"; ?>
            </div>
	    </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
