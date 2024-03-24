<?php
include_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["reporter"]) && isset($_POST["table"]) && isset($_POST["id"])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {

        $sql = $connection->prepare("DELETE FROM ".$_POST["table"]." WHERE id = ?");
        $sql->bind_param("s", $_POST["id"]);
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
