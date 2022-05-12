<?php 
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
function EmptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function UserNameExist( $name , $email){
    $request = connectDb() -> prepare("SELECT * FROM users WHERE username = ? OR email = ?;");
    $request -> execute([$name , $email]);
    $resultat = $request->fetch(PDO::FETCH_ASSOC);

    if ($resultat){
        return $resultat;
        
    } else {
            return false;
    }
}

function createUser($connection, $name, $email, $password){
    $request = connectDb() -> prepare("INSERT INTO users (email,password,username) VALUES (?,?,?);");
    $request -> execute([$connection, $name, $email, $password]);
    $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
}

function loginUser($connection, $uid, $pwd){
    $uidExist = UserNameExist($connection, $name , $email);
    
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