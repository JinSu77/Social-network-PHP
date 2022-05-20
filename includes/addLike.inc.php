<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
include_once "./Post.inc.php";
session_start();
$post_id = filter_input(INPUT_GET, "postId");
$post->AddLike($_SESSION["userid"], $post_id);
