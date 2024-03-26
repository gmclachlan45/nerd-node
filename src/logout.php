<?php session_start(); ?>
<?php
include_once "../config.php";

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$error = mysqli_connect_error();
if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
} else {
    if(isset($_SESSION["sessionId"]) ) {
        $deleteSession = $connection->prepare("DELETE FROM userSession WHERE id = ?");
        $deleteSession->bind_param("s", $_SESSION["sessionId"]);
        $deleteSession->execute();

        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    }


    header('Location: '.SITEROOT);
    mysqli_close($connection);
    die();
}

?>
