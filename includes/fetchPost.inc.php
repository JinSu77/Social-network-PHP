<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');

$db = new DB();
$bdd = $db->connectDb();
require "./Post.inc.php";
session_start();
$req = $bdd->prepare("SELECT * FROM follower WHERE user_id = ? OR follower_id =?");
$req->execute([$_SESSION["userid"], $_SESSION["userid"]]);
$res = $req->fetch(PDO::FETCH_ASSOC);
var_dump($res)