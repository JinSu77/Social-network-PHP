<?php
require_once "./db_connect.inc.php";
require_once("./includes/functions.inc.php");
session_start();
$ModifiedUsername = $_POST["modifyUsername"];
$ModifiedBio = $_POST["userBioModify"];
echo "Username : " . $ModifiedUsername;
echo "Bio : " . $ModifiedBio;
echo "pfp : " . $ModifiedPfp;
echo "Result" . "</br>";
var_dump($_FILES);