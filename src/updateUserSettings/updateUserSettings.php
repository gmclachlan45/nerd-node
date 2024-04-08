<?php
include_once "../../config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        $userId = $_SESSION["sessionUserId"]; // User ID from the session

        // Get the old user data
        $sql = $connection->prepare("SELECT username, email, password, profilePicture FROM siteUser WHERE id = ?");
        $sql->bind_param("i", $userId);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();

        // Use old data if new data is not provided
        $username = empty($_POST["edit-username"]) ? $row['username'] : $_POST["edit-username"];
        $email = empty($_POST["edit-email"]) ? $row['email'] : $_POST["edit-email"];
        $password = empty($_POST["edit-password"]) ? $row['password'] : md5($_POST["edit-password"]); // Hash the password with md5
        $profilePicture = $row['profilePicture'];

        // Handle the profile picture upload
        if (!empty($_FILES["edit-pfp"]["name"])) {
            $target_dir = __DIR__ . "/../public/images/profiles/";
            $imageFileType = end(explode(".",$_FILES["edit-pfp"]["name"]));
            echo $upfile;
            $target_file = $target_dir . $username.".".$imageFileType;
            $check = getimagesize($_FILES["edit-pfp"]["tmp_name"]);

            if($check !== false) {
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                }
                if ($_FILES["edit-pfp"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                } else {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    } else {
                        if (move_uploaded_file($_FILES["edit-pfp"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["edit-pfp"]["name"])). " has been uploaded.";
                            $profilePicture =$username.".".$imageFileType;
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }

            }
        }

        $sql = $connection->prepare("UPDATE siteUser SET username = ?, email = ?, password = ?, profilePicture = ? WHERE id = ?");
        $sql->bind_param("ssssi", $username, $email, $password, $profilePicture, $userId);
        if($sql->execute()) {
            // Update session variables
            $_SESSION["sessionUsername"] = $username;
            header('Location: ' . SITEROOT . 'nerd/?username='.$username); // Redirect to home page after successful update
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
        die();
    }
}
?>
