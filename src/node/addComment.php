<?php
include_once "../../config.php";
foreach( $_POST as $key => $value ) {
    echo "$key --- $value<br>";
};
echo $_SERVER['HTTP_REFERER'];
//die;
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["originalPost"]) && isset($_POST["content"]) && isset($_POST["author"])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        // Check if user already exists
        echo "here";

        $sql = $connection->prepare("INSERT INTO comment (poster, originalPost, parentComment, likes, content) VALUES (?, ?, ?, 0, ?)");
        $sql->bind_param("ssss", $_POST["author"], $_POST["originalPost"], $_POST["parentComment"], $_POST["content"]);

        if($sql->execute()) {
            echo "An account for the user $email has been created";
            // Redirect to login page
            header('Location: '.$_SERVER['HTTP_REFERER']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
        die();
    }
}


?>
e
