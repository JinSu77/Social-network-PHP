<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
session_start();
require "./Post.inc.php";
$post = new Post($bdd);
$test = $post->getLastPost($_SESSION["userid"]);
echo json_encode($test);