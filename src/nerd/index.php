<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nerd Node</title>
    <link rel="stylesheet" type="text/css" href="./nerd css/nerduser.css">
    <link rel="stylesheet" href="public/css/reset.css">
    <?php include "../../config.php"; ?>
  </head>
  <body>
    <header>
      <h1 style="font-size: 3em; color: green;">Nerd_Node</h1>
      <h2 style="font-size: 3em; color: green; background-color: #26C6DA; height: 80px; width: 100%;">
        /Nerd/username
        <button id="report"><a href=#report>Report(user)</a></button>
        <button id="helloadmin"><a href="#helloadmin">Hello AdminUser</a></button>
        <button id="createpost"><a href="/">Create Post</a></button>
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
			</div>
        <div class="post">
          <div class="post-header">
            <h2>Thank you kind nerds!</h2>
            <span class="username">Username</span>
            <button class="report">Report this Node</button>
          </div>
          <p>I was sent a copy of Structure and interpretation of computer programs. I'm gonna be the best hacker</p>
          <div class="votes">
            <button class="upvote">&#x25B2;</button>
			<span class="upvotes">545,277,557</span>
            <button class="downvote">&#x25BC;</button>
            <span>Responses (4)</span>
          </div>
        </div>
        <div class="post">
          <div class="post-header">
            <h2>Can I pleas get a copy of Structure and int...</h2>
            <span class="username">Username</span>
            <button class="report">Report this Node</button>
          </div>
          <p>pls. pls. I just want a copy of SICP, but the paper copies are so EXPENSIVE. Anyone feeling  generous?</p>
          <div class="votes">
            <button class="upvote">&#x25B2;</button>
			<span class="upvotes">100,000</span>
            <button class="downvote">&#x25BC;</button>
            <span>Responses (4)</span>
          </div>
        </div>
        <div class="post">
          <div class="post-header">
            <h2>Test post</h2>
            <span class="username">Username</span>
            <button class="report">Report this Node</button>
          </div>
          <p>My first post on this website</p>
          <div class="votes">
            <button class="upvote">&#x25B2;</button>
			<span class="upvotes">8</span>
            <button class="downvote">&#x25BC;</button>
            <span>Responses (5)</span>
          </div>
        </div>
	</form>
  <div id="right-sidebar">
  <!-- Admin Settings Form -->
  <div id="admin-settings-form">
    <h2>Admin Settings</h2>
    <form action="http://www.randyconnolly.com/tests/process.php" method="post">
      <label for="suspend-user">Suspend User:</label>
      <input type="text" id="suspend-user" name="suspend-user" placeholder="Enter username">
      <br>
      <label for="delete-user">Delete User:</label>
      <input type="text" id="delete-user" name="delete-user" placeholder="Enter username">
      <br>
      <input type="submit" value="Submit Admin Changes">
    </form>
  </div>

  <!-- User Settings Form -->
  <div id="user-settings-form">
    <h2>User Settings</h2>
    <form action="http://www.randyconnolly.com/tests/process.php" method="post">
      <label for="edit-username">Edit Username:</label>
      <input type="text" id="edit-username" name="edit-username" placeholder="Enter new username">
      <br>
      <label for="edit-password">Edit Password:</label>
      <input type="password" id="edit-password" name="edit-password" placeholder="Enter new password">
      <br>
      <label for="edit-email">Edit Email:</label>
      <input type="email" id="edit-email" name="edit-email" placeholder="Enter new email">
      <br>
      <label for="edit-visibility">Edit Visibility:</label>
      <select id="edit-visibility" name="edit-visibility">
        <option value="public">Public</option>
        <option value="private">Private</option>
      </select>
      <br>
      <input type="submit" value="Submit User Changes">
    </form>
  </div>
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
