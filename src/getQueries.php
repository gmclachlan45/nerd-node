<?php
$orderBy = '';
$where = '';

switch ($_GET['o'] ?? '') {
    case 'hot':
        $orderBy = ' ORDER BY heat DESC';
        break;
    case 'comments':
        $orderBy = ' ORDER BY comments DESC';
        break;
    default:
        $orderBy = ' ORDER BY id DESC';
        break;
}

if (isset($_GET['tag'])) {
    $tag = mysqli_real_escape_string($connection, $_GET['tag']);
    $where = "WHERE postTag.tagName = '$tag'";
}

$searchPosts='';
?>