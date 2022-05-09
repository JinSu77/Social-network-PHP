<?php
// Vérifie que l'utilisateur est bien arrivé ici via la page login
if (isset($_POST['submit'])) {

    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    require_once "./db_connect.inc.php";
    require_once "./functions.inc.php";
    // Fonctions dans fonctions.inc.php
    if (EmptyInputLogin($username, $pwd) !== false) {
        header("location: ../Login.php?error=emptyinput");
        exit();
    }
    loginUser($connection, $username, $pwd);
} else {
    header("location: ../Login.php");
    exit();
}