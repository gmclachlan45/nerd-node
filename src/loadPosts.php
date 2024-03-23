<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
include "getQueries.php";
$sql = "SELECT post.title, siteUser.username, siteUser.profilePicture, post.sku, post.content,
               post.likes, COUNT(comment.id) AS comments, (ABS(post.likes)) AS heat
        FROM (post JOIN siteUser ON post.poster = siteUser.id)
             LEFT JOIN comment ON comment.originalPost = post.id
        GROUP BY post.id $orderBy";

$posts = array();
if($result = mysqli_query($connection, $sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($posts, ['title' => $row['title'],
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
