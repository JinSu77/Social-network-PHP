<?php
session_start();
require "./db_connect.inc.php";
$db = new DB;
$searchUserCommand = "SELECT username FROM users WHERE username like ?";
$request = $db->connectDb()->prepare($searchUserCommand);
$request->execute(['%' . $_POST['search'] . '%']);
$resultat = $request->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultat);