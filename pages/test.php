<?php
include_once("./includes/Post.inc.php");
?>

<?php 
$post = new Post($bdd);
$post-> getLastPost($_SESSION["userid"]); ?>