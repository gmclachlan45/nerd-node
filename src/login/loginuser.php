<?php
include_once "../../config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        echo "hereeee";
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        //        $username = $_POST["username"];


        // Check if user exists
        $checkUser = $connection->prepare("SELECT * FROM siteUser WHERE email = ? AND password = ?");
        $checkUser->bind_param("ss", $email, $password);
        $checkUser->execute();
        $result = $checkUser->get_result();
        if ($result->num_rows == 0) {
            echo "No user found.";
            header('Location: index.php?showLoginForm=true&loginError=true');
            die;
        }

        while($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $userId = $row['id'];
            $isAdmin = $row['isAdmin'];
        }
        session_start();

        $sessionId = session_id();
        $_SESSION["sessionUserId"] = $userId;
        $_SESSION["sessionUsername"] = $username;
        $_SESSION["sessionId"] = $sessionId;
        if($isAdmin)
            $_SESSION["isAdmin"] = true;

        $sql = $connection->prepare("INSERT INTO userSession VALUES (?, ?)");
        $sql->bind_param("ss" , $sessionId, $userId);
        if($sql->execute()) {
            //echo "A session has been created";
            // Redirect to login page
            header('Location: '.SITEROOT);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
        die();
    }
}


?>
