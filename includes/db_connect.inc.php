<?php
// PDO pas utilisé car php utilisé est procédurale et non OOP
// Code inclus quand la connection à la base de donné est nécéssaire
$ip = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "paintenmieux";

$connection = mysqli_connect($ip, $dbUsername, $dbPass, $dbName);
if (!$connection) {
    die("Connection to db failed : " . mysqli_connect_error());
}