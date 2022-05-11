<?php
// Code inclus quand la connection à la base de donné est nécéssaire
$ip = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "pathetic";

$connection = mysqli_connect($ip, $dbUsername, $dbPass, $dbName);
if (!$connection) {
    die("Connection to db failed : " . mysqli_connect_error());
}