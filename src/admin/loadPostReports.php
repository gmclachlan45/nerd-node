<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT post.id, post.title, siteUser.username, post.sku, post.content
        FROM (post JOIN siteUser ON post.poster = siteUser.id)
        WHERE post.reported = true
        GROUP BY post.id ";

$postReports = array();
if($result = mysqli_query($connection, $sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($postReports, [
                            'id' => $row['id'],
                            'title' => $row['title'],
                            'author' => $row['username'],
                            'pfp' => $row['profilePicture'],
                            'sku' => $row['sku'],
                            'content' => $row['content'],
                            'likes' => number_format($row['likes']),
                            'commentCount' => $row['comments']
        ]
        );
    }
};
?>
