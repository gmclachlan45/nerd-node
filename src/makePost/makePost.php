<?php
session_start(); // start a session
include_once "../../config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["postTitle"]) && isset($_POST["postContent"])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        $postTitle = $_POST["postTitle"];
        $postContent = $_POST["postContent"];
        $userId = $_SESSION["sessionUserId"]; // get the user id from the session
        $username = $_SESSION["sessionUsername"]; // get the username from the session

        $sql = $connection->prepare("INSERT INTO post (title, content, poster) VALUES (?, ?, ?)");
        $sql->bind_param("ssi", $postTitle, $postContent, $userId);
        if($sql->execute()) {
            header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/nerd/index.php?username=' . $username); // redirect to the user's page
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
        die();
    }
}
?>