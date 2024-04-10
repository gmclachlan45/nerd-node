<?php
$host = DBHOST;
$database = DBNAME;
$user = DBUSER;
$pass = DBPASS;

$connection = mysqli_connect($host, $user,$pass, $database, "3306");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$stats = array();

$sql = " SELECT *
FROM
(SELECT COUNT(*) AS userCount FROM siteUser) as u
CROSS JOIN
(SELECT COUNT(id) AS postCount, SUM(ABS(likes)) AS postLikeCount FROM post) as p
CROSS JOIN
(SELECT COUNT(id) AS commentCount, SUM(ABS(likes)) AS commentLikeCount FROM comment) as c";


if($result = mysqli_query($connection, $sql)) {
    $row = mysqli_fetch_assoc($result);
    $stats = $row;
};
?>
