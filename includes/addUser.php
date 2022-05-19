<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
include_once "./friends.inc.php";
session_start();
$follower_id = filter_input(INPUT_GET, "id");
$follower_uid = filter_input(INPUT_GET, "username");
$friends->AddFriends($_SESSION["userid"],$follower_id);
$friends->CreateChannel($_SESSION["userid"],$follower_uid);
header("location: ../index.php");