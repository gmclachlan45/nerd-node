<?php
include_once "../../config.php";
session_start();
if(! isset($_SESSION["sessionId"]) || $_SESSION["sessionUsername"] != "admin") {
    header('Location: '.SITEROOT);
}

//include_once "loadUserReports.php";
//include_once "loadPostReports.php";
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

                    }
                } else {
                    echo "<div style='text-align:center; width:100%;font-size: 1em;' >No Current Post Reports!</div>";
                }
                ?>

            </div>
            <div class="center">
                <h2> User Reports</h2>
                <?php
                if($userReports){
                    foreach($userReports as $report) {

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
