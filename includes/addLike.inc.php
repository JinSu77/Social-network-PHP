<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
include_once "./Post.inc.php";
session_start();
$post_id = filter_input(INPUT_GET, "postId");
$post->AddLike($_SESSION["userid"],$post_id);
$req = $bdd->prepare("SELECT COUNT(*) FROM reaction_like WHERE user_id = ? OR post_id =?");
$req->execute([$_SESSION["userid"], $post_id]);
$res = $req->fetch(PDO::FETCH_ASSOC);
echo $res["COUNT(*)"];