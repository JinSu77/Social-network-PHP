<?php
require_once "./db_connect.inc.php";
require_once("./functions.inc.php");
session_start();
$ModifiedUsername = $_POST["modifyUsername"];
$ModBio = filter_input(INPUT_POST, 'userBioModify');
$ID = $_SESSION["userid"];
$db = new DB;
$sql = "UPDATE users set username= ?, bio= ? WHERE id = ?";
$reqSQL = $db->connectDb()->prepare($sql);
$reqSQL->execute(array($ModifiedUsername, $ModBio, $ID));
$resultat = $reqSQL->fetch(PDO::FETCH_ASSOC);
uploadMaPhoto();
session_destroy();
header("location: ../index.php");