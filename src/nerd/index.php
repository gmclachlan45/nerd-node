<?php
$username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nerd Node</title>
    <link rel="stylesheet" type="text/css" href="./nerd css/nerduser.css">
    <link rel="stylesheet" href="public/css/reset.css">
    <?php include_once "../../config.php"; 
    include_once "loadPosts.php";
    include_once "../renderPosts.php"; 
    ?>
  </head>
  <body>
    <header>
      <h1 style="font-size: 3em; color: green;">Nerd_Node</h1>
      <h2 style="display: flex; align-items: center; justify-content: space-between;  font-size: 3em; color: green; background-color: #26C6DA; height: 80px; width: 100%;">
        /Nerd/username
        <button id="createpost"><a href="/">Create Post</a></button>
        <button id="report"><a href=#report>Report(user)</a></button>
        <button id="helloadmin"><a href="#helloadmin">Hello AdminUser</a></button>
      </h2>
    </header>
	<main>
		<div class="content-and-sidebar">
		  <form id="posts">
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
                        renderPost($post);
                    }
                } else {
                    echo "There are no posts available...";
                }
                ?>
	</form>
  <div id="right-sidebar">
  <?php 
    $logged_in = true;
    $username = "admin";
    if($logged_in) {
        if($username == "admin") {
            include "../components/adminSettings.php";
            include "../components/userSettings.php";
        } else if (false) {
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
</main>
	<footer>
		<h4>Copyright COSC 360
		</h4>
		<p style="margin-left: 50em;">Why we ripped off Reddit</p>
		<p style="margin-left: 50em;">Why we'll do it again</p>
	  </footer>
</body>
</html>
