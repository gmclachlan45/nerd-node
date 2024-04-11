<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$getPost = $connection->prepare("SELECT post.id, post.title, siteUser.username, siteUser.profilePicture, post.sku, post.content, post.likes FROM (post JOIN siteUser ON post.poster = siteUser.id) WHERE post.sku = ?");

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
             'pfp' => $row['profilePicture'],
             'sku' => $row['sku'],
             'content' => $row['content'],
             'likes' => number_format($row['likes'])
    ];
}

$getComments = $connection->prepare("
SELECT comment.id AS id, comment.parentComment AS parentId, siteUser.username as username, siteUser.profilePicture AS profilePicture, comment.content AS content, parentComment.content AS parentContent, comment.likes
FROM comment
LEFT JOIN post ON comment.originalPost = post.id
LEFT JOIN siteUser ON comment.poster = siteUser.id
LEFT JOIN comment AS parentComment ON comment.parentComment = parentComment.id
WHERE comment.originalPost = ?;
");

$getComments->bind_param("s", $post['id']);
$getComments->execute();
$result = $getComments->get_result();

$comments = array();

while($row = mysqli_fetch_assoc($result)) {
    array_push($comments, [
        'author' => $row['username'],
        'pfp' => $row['profilePicture'],
        'id' => $row['id'],
        'parentId' => $row['parentId'],
        'content' => $row['content'],
        'parentContent' => $row['parentContent'],
        'likes' => number_format($row['likes'])
    ]
    );
}
?>
