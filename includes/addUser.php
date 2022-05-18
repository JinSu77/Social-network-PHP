<?php
$follower_uid = filter_input(INPUT_GET, "username");
require_once "./db_connect.inc.php";
include_once "./friends.inc.php";
session_start();
$follower_id = filter_input(INPUT_GET, "id");

/* $_SESSION["follower_uid"]=$follower_uid; */
/* $follower_uid = $friends->accesUsername($follower_id); */
$friends->AddFriends($_SESSION["userid"],$follower_id);
$friends->CreateChannel($_SESSION["userid"],$follower_uid);
header("location: ../index.php"); 
?>
