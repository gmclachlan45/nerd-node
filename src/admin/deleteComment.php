<?php
include_once "../../config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id']) && isset($_POST['userSession'])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $sql = $connection->prepare("DELETE FROM comment WHERE id = ?");
    $sql->bind_param("i", $_POST['id']);

    if($sql->execute()) {
        http_response_code(200);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
    die();
} else{
    http_response_code(500);
}
?>
