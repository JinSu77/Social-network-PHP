<?php
require_once "./db_connect.inc.php";
require "./message.inc.php";
require "./friends.inc.php";
session_start();

$friends->ShowChanel($_SESSION["userid"]);
echo json_encode($friends);