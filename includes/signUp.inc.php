<?php
// Check que l'utilisateur est accès à cet page après avoir tenter de se créer un compte
if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwdcheck = $_POST['pwdcheck'];

    // Management des erreurs

    require_once "./db_connect.inc.php";
    require "./functions.inc.php";
    if (EmptyInputSignUp($name, $email, $password, $pwdcheck) !== false) {
        header("location: ../signUp.php?error=emptyinput");
        exit();
    }
    if (InvalidUsername($name) !== false) {
        header("location: ../signUp.php?error=InvalidUsername");
        exit();
    }
    if (InvalidEmail($email) !== false) {
        header("location: ../signUp.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($password, $pwdcheck) !== false) {
        header("location: ../signUp.php?error=passwordAreDifferent");
        exit();
    }
    if (UsernameExist($name, $email) !== false) {
        header("location: ../signUp.php?error=usernameTaken");
        exit();
    }

    createUser($name, $email, $password);
    header("location: ../Login.php");
} else {
    header("location: ../signUp.php");
    exit();
}