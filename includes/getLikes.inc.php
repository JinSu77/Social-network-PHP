<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
session_start();
include_once "./Post.inc.php";
$post_id = filter_input(INPUT_GET, "postId");
$req = $bdd->prepare("SELECT COUNT(*) FROM reaction_like WHERE user_id = ? OR post_id =?");
$req->execute([$_SESSION["userid"], $post_id]);
$res = $req->fetch(PDO::FETCH_ASSOC);
echo $res["COUNT(*)"];