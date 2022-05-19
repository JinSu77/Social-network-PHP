<?php
session_start();
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
$db = new DB;
$searchUserCommand = "DELETE FROM users WHERE id= ?";
$request = $db->connectDb()->prepare($searchUserCommand);
$request->execute(['%' . $_SESSION["id"] . '%']);