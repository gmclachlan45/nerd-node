<?php
$orderBy = '';


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
$searchPosts='';


?>
