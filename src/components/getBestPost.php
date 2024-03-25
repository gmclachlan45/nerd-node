<?php
include_once "../../config.php";
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT post.title, post.id, siteUser.username, siteUser.profilePicture, post.sku, post.content,
               post.likes, COUNT(comment.id) AS comments
        FROM (post JOIN siteUser ON post.poster = siteUser.id)
             LEFT JOIN comment ON comment.originalPost = post.id
        GROUP BY post.id
        ORDER BY likes DESC
        LIMIT 1";

$bestPost = [];
if($result = mysqli_query($connection, $sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        $bestPost = [
            'title' => $row['title'],
            'id' => $row['id'],
            'author' => $row['username'],
            'pfp' => $row['profilePicture'],
            'sku' => $row['sku'],
            'content' => $row['content'],
            'likes' => number_format($row['likes']),
            'commentCount' => $row['comments']
        ];
    }
} else {
    $bestPost = ['title' => "I am the very model of a modern major general",
                 'author' => "literally me",
                 'sku' => 'modern-major-general',
                 'content' => "I am the very model of a modern Major-Gineral,
I've information vegetable, animal, and mineral,
I know the kings of England, and I quote the fights historical.",
                 'likes' => number_format(52442422),
                 'commentCount' => 52442
    ];
}


?>
