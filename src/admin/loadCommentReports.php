<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT comment.id,  siteUser.username, comment.content
        FROM (comment JOIN siteUser ON comment.poster = siteUser.id)
        WHERE comment.reported = true
        GROUP BY comment.id";

$commentReports = array();
if($result = mysqli_query($connection, $sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($commentReports, [
            'id' => $row['id'],
            'author' => $row['username'],
            'pfp' => $row['profilePicture'],
            'content' => $row['content'],
        ]
        );
    }
};
?>
