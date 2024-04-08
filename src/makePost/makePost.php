<?php
include_once "../../config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["postTitle"]) && isset($_POST["postContent"]) && isset($_POST['poster']) && isset($_POST['postTag'])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        $postTitle = $_POST["postTitle"];
        $postContent = $_POST["postContent"];
        $userId = $_POST["poster"];
        $postTag = $_POST["postTag"];
        $sku = substr($postContent, 0, min(15, strlen($postContent)));
        $sku = str_replace(" ", "-", $sku);
        $sku = str_replace(",", "-", $sku);
        $sku = str_replace(".", "-", $sku);

        $sql = $connection->prepare("INSERT INTO post (title, content, poster, likes, sku) VALUES (?, ?, ?, 0, ?)");
        $sql->bind_param("ssis", $postTitle, $postContent, $userId, $sku);
        if($sql->execute()) {
            $postId = $connection->insert_id;
            $sql = $connection->prepare("INSERT INTO posttag (tagName, postId) VALUES (?, ?)");
            $sql->bind_param("si", $postTag, $postId);
            if($sql->execute()) {
                header('Location: ../node/?title=' . $sku); // redirect to the newly made post
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
        die();
    }
}
?>