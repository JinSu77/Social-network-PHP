<?php
require_once "./db_connect.inc.php";
require_once "./profile.inc.php";
session_start();
$profile->DeleteUser($_SESSION['userid']);
header("location: ../login.php?error=wrongLogin");
