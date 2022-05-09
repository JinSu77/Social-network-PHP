<?php
//Fichier contenant la majorité des fonction php utilisé
// Vérifie que le formulaire n'est pas d'input vide
// @Setsudan
function EmptyInputSignUp($name, $email, $password, $pwdcheck)
{
    if (empty($name) || empty($email) || empty($password) || empty($pwdcheck)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Vérifie que l'username n'est pas de charactère spéciaux
// @Setsudan
function InvalidUsername($name)
{
    if (preg_match("/^*[a-zA-Z0-9]$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Vérifie que l'email soit valide
// @Setsudan
function InvalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Vérifie que les mdp soit correspondant
// @Arsène
function pwdMatch($password, $pwdcheck)
{
    if ($password == $pwdcheck) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}

//Vérifie qu'un mail ou nom d'utilisateur est déjà pris
//@Setsudan

function UsernameExist($connection, $name, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signUp.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

# La théorie dit qu'on en a pas besoin mais au casou je le garde

/* function projectNameExist($connection, $projectname)
{
    $sql = "SELECT * FROM projects WHERE projectname = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signUp.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $projectname);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
} */

// Créer un utilisateur dans la base de donnée
// @Setsudan
function createUser($connection, $name, $email, $password)
{
    $sql = "INSERT INTO users (email,password,username) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=JeSaisPas");
        exit();
    }
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedpwd, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Login.php");
    exit();
}
#! à refaire pour les post mais la fonctions est bonne
function saveProject($connection, $author, $projectName, $board)
{
    $sql = "INSERT INTO projects (author,projectname,board) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=JeSaisPas");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $author, $projectName, $board);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ./whiteboard.php");
    exit();
}

// Vérifie que le formulaire n'est pas d'input vide
// @Setsudan
function EmptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Login l'utilisateur
// @Setsudan
function loginUser($connection, $uid, $pwd)
{
    $uidExist = UsernameExist($connection, $uid, $uid);

    if ($uidExist === false) {
        header("location: ../Login.php?error=wrongLogin");
        exit();
    }
    $pwdHashed = $uidExist['password'];
    $checkPass = password_verify($pwd, $pwdHashed);

    if ($checkPass === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else if ($checkPass === true) {
        session_start();
        $_SESSION["userid"] = $uidExist['usersId'];
        $_SESSION["useruid"] = $uidExist['username'];
        header("location: ../index.php");
        exit();
    }
}