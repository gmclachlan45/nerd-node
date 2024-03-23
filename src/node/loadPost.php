<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$getPost = $connection->prepare("SELECT * FROM (post JOIN siteUser ON post.poster = siteUser.id) WHERE post.sku = ?");

$getPost->bind_param("s", $sku);
$getPost->execute();
$result = $getPost->get_result();

if ($result->num_rows == 0) {
    echo "No post found.";
    mysqli_close($connection);
    header('Location: '.SITEROOT.'404.html');
    die;
}


$post= [];
while($row = mysqli_fetch_assoc($result)) {
    $post = ['id' => $row['id'],
             'title' => $row['title'],
             'author' => $row['username'],
             'sku' => $row['sku'],
             'content' => $row['content'],
             'likes' => number_format($row['likes']),
             'commentCount' => $row['comments']
    ];

}

$getComments = $connection->prepare("SELECT p1.id AS id, p2.id AS parentId, siteUser.username as username, p1.content AS content, p2.content AS parentContent, p1.likes
FROM comment AS p1 LEFT JOIN comment AS p2 ON p1.parentComment = p2.id JOIN siteUser ON p1.poster = siteUser.id WHERE p1.originalPost = ?");

$getComments->bind_param("s", $post['id']);
$getComments->execute();
$result = $getComments->get_result();

$comments = array();

while($row = mysqli_fetch_assoc($result)) {
    array_push($comments, [
        'author' => $row['username'],
        'id' => $row['id'],
        'parentId' => $row['parentId'],
        'content' => $row['content'],
        'parentContent' => $row['parentContent'],
        'likes' => number_format($row['likes'])
    ]
    );
}
?>
