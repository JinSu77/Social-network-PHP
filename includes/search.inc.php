<?php
session_start();
require_once "./db_connect.inc.php";
$db = new DB;
$searchUserCommand = "SELECT username , id FROM users WHERE username like ?";
$request = $db->connectDb()->prepare($searchUserCommand);
$request->execute(['%' . $_POST['search'] . '%']);
$resultat = $request->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultat);
