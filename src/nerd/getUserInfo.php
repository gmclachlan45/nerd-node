<?php
include_once "../../config.php";
if (isset($_GET['username'])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $sql = $connection->prepare("SELECT * FROM siteUser WHERE username = ?");
    $sql->bind_param("s", $_GET['username']);
    $sql->execute();
    $result = $sql->get_result();

    if($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];
        $username = $row['username'];
        $isDisabled = $row['isDisabled'];
    } else {
        header('Location: ../404.html');
    }
        mysqli_close($connection);
        if($isDisabled && !isset($_SESSION["isAdmin"]))
            header('Location: ../404.html');

    } else{
        header('Location: ../404.html');
    }
?>
