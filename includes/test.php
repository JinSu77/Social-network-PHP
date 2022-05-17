<?php
require_once "./db_connect.inc.php";
include_once "./friends.inc.php";
session_start();
$follower_id = filter_input(INPUT_GET, "id");
$friends->  AddFriends($_SESSION["userid"],$follower_id);
header("location: ../index.php");
 
?>