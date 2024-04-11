<?php
/*
   Just a note, we don't have any API endpoints
   that just give info themselves, so the only real thing
   we can test is that the DB connects.

   You can't say we didn't try.
 */

function phpVersionTest() {
    echo "Starting PHP Version Test\n";
    //throw new Exception("Test failure");
    if((int) explode(".",phpversion()) >=8) {
        echo "SUCCESS\n";
    }
    else {
        throw new Exception("Test failure");
    }
}

    function dbTest() {
        echo "Starting Database test\n";

        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            throw new Exception("Test failure");
        } else {
            $checkUser = $connection->prepare("SELECT * FROM siteUser");
            $checkUser->execute();
            $result = $checkUser->get_result();
            if ($result->num_rows == 0) {
                throw new Exception("Test failure");
            } else {
                echo "SUCCESS\n";
            }
        }
    }

    function adminExistsTest() {
        echo "Starting Admin Exists Test\n";
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            throw new Exception("Test failure");
        } else {
            $checkUser = $connection->prepare("SELECT * FROM siteUser WHERE isAdmin = true");
            $checkUser->execute();
            $result = $checkUser->get_result();
            if ($result->num_rows == 0) {
                throw new Exception("Test failure");
            } else {
                echo "SUCCESS\n";
            }
        }
    }
?>
