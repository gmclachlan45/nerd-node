<?php
include_once "../../config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"])) {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $username = $_POST["username"];
        $isAdmin = false;
        $isDisabled=false;
        // Check if user already exists
        $checkUser = $connection->prepare("SELECT * FROM siteUser WHERE email = ?");
        $checkUser->bind_param("s", $email);
        $checkUser->execute();
        $result = $checkUser->get_result();
        if ($result->num_rows > 0) {
            echo "User already exists with this email.";
            die;
        }

        // Default profile picture
        $profile_picture = "default.png";

        $sql = $connection->prepare("INSERT INTO siteUser (username, password, email, profilePicture, isAdmin, isDisabled) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssii", $username, $password, $email, $profile_picture, $isAdmin, $isDisabled);
        if($sql->execute()) {
            echo "An account for the user $email has been created";
            // Redirect to login page
            header('Location: ./?showLoginForm=true');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
        die();
    }
}


?>
