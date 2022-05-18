<?php
session_start();
require_once "./db_connect.inc.php";
$db = new DB;
$searchUserCommand = "DELETE FROM users WHERE id= ?";
$request = $db->connectDb()->prepare($searchUserCommand);
$request->execute(['%' . $_SESSION["id"] . '%']);