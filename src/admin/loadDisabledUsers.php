<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM siteUser
        WHERE isDisabled = true";

$disabledUsers = array();
if($result = mysqli_query($connection, $sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($disabledUsers, [
            'id' => $row['id'],
            'username' => $row['username'],
            'pfp' => $row['profilePicture'],
        ]
        );
    }
};
?>
