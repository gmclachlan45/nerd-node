<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = new mysqli($host, $user, $pass, $database, "3306");

if ($connection->connect_error) {
    die("Failed to connect to MySQL: " . $connection->connect_error);
}

include "getQueries.php";

$tag = isset($_GET['tag']) ? $_GET['tag'] : 'all';

$where = " WHERE siteUser.username = ?";
if ($tag !== 'all') {
    $where .= " AND postTag.tagName = ?";
}

$sql = "SELECT post.title, post.id, siteUser.username, siteUser.profilePicture, post.sku, post.content,
               post.likes, COUNT(comment.id) AS comments, (ABS(post.likes)) AS heat, GROUP_CONCAT(postTag.tagName) AS tags
        FROM (post JOIN siteUser ON post.poster = siteUser.id)
             LEFT JOIN comment ON comment.originalPost = post.id
             LEFT JOIN postTag ON postTag.postId = post.id
        $where
        GROUP BY post.id $orderBy";

$posts = array();
$stmt = $connection->prepare($sql);

if ($tag !== 'all') {
    $stmt->bind_param('ss', $username, $tag);
} else {
    $stmt->bind_param('s', $username);
}

if($stmt->execute()) {
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        array_push($posts, [
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['username'],
            'pfp' => $row['profilePicture'],
            'sku' => $row['sku'],
            'content' => $row['content'],
            'likes' => number_format($row['likes']),
            'commentCount' => $row['comments'],
            'tags' => explode(',', $row['tags'])
        ]);
    }
};
?>