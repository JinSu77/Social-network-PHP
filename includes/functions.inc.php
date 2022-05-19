<?php
require_once(realpath(__DIR__ . DIRECTORY_SEPARATOR . 'db_connect.inc.php'));

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

function UserNameExist($name, $email)
{
    $db = new DB();
    $request = $db->connectDb()->prepare("SELECT * FROM users WHERE username = ? OR email = ?;");
    $request->execute([$name, $email]);
    $resultat = $request->fetch(PDO::FETCH_ASSOC);

    if ($resultat) {
        return $resultat;
    } else {
        return false;
    }
}

function createUser($name, $email, $password)
{
    $db = new DB();
    $request = $db->connectDb()->prepare("INSERT INTO users (email,password,username) VALUES (?,?,?);");
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $request->execute([$email, $pass, $name]);
}
function loginUser($uid, $pwd)
{
    $uidExist = UserNameExist($uid, $uid);

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
        $_SESSION["userid"] = $uidExist['id'];
        $_SESSION["useruid"] = $uidExist['username'];
        header("location: ../index.php");
        exit();
    }
}

function afficherMonImageDeProfil($id)
{
    $id = $_SESSION["userid"];
    $db = new DB();
    $maRequete = $db->connectDb()->prepare("SELECT user_photo from users where id= ? ");
    $maRequete->execute([$id]);
    $result = $maRequete->fetch();

    $myFilePath = $result["user_photo"];
    //echo "<img style='width: 10%;' src='$myFilePath' alt='Image de profil'>" . '<br>';
}

function uploadMaPhoto()
{
    $id = $_SESSION["userid"];
    $error = 0;
    if (isset($_FILES['profilPicture']) && $_FILES['profilPicture']['error'] == 0) {
        // La size de la photo de profil doit être inférieur à 10mo.
        if ($_FILES['profilPicture']['size'] <= 10000000) {
            $imageInfos = pathinfo($_FILES['profilPicture']['name']);
            $extensionImage = $imageInfos['extension'];
            $extensionAutorisee = array('png', 'jpeg', 'jpg', 'gif');

            if (in_array($extensionImage, $extensionAutorisee)) {
                $fileName = time() . rand() . '.' . $extensionImage;
                $myPublicFilePath = "uploads/" . $fileName;
                $myFilePath = __DIR__ . "/../" . $myPublicFilePath;
                move_uploaded_file($_FILES['profilPicture']['tmp_name'], $myFilePath);
            } else {
                $error = 1;
            }
            $db = new DB();
            $request = $db->connectDb()->prepare("UPDATE users SET user_photo=? where id=?");
            $request->execute([
                $myPublicFilePath,
                $id
            ]);
        } else {
            $error = 1;
        }
    } else {
        $error = 1;
    }

    if ($error == 1) {
        $error = 0;
    } /* else {
        http_response_code(302);
        header("location: ../Landing.php");
        exit();
    } */
}

function afficherPostImage($id)
{
    $id = $_SESSION["userid"];
    $db = new DB();
    $maRequete = $db->connectDb()->prepare("SELECT post_photo from Post where id= ? ");
    $maRequete->execute([$id]);
    $result = $maRequete->fetch();

    $myFilePath = $result["user_photo"];
    echo "<img style='width: 10%;' src='$myFilePath' alt='Image de profil'>" . '<br>';
}

function PostMaPhoto()
{
    $id = $_SESSION["userid"];
    $error = 0;
    if (isset($_FILES['createpostImg']) && $_FILES['createpostImg']['error'] == 0) {
        // La size de la photo de profil doit être inférieur à 10mo.
        if ($_FILES['createpostImg']['size'] <= 10000000) {
            $imageInfos = pathinfo($_FILES['createpostImg']['name']);
            $extensionImage = $imageInfos['extension'];
            $extensionAutorisee = array('png', 'jpeg', 'jpg', 'gif');

            if (in_array($extensionImage, $extensionAutorisee)) {
                $fileName = time() . rand() . '.' . $extensionImage;
                $myPublicFilePath = "uploads/" . $fileName;
                $myFilePath = __DIR__ . "/../" . $myPublicFilePath;
                move_uploaded_file($_FILES['createpostImg']['tmp_name'], $myFilePath);
            } else {
                $error = 1;
                $myFilePath = NULL;
            }
            //$request = $db->connectDb()->prepare("INSERT INTO post(user_id,post_text,post_img,post_date) VALUES (?,?,?,now())");
            //$request->execute([$id,"",$myPublicFilePath]);
        } else {
            $myFilePath = NULL;
        }

    } else {
        $error = 1;
    }

    if ($error == 1) {
        $error = 0;
    }
    $db = new DB();
    $post = new Post($db->connectDb());
    $post_text = filter_input(INPUT_POST, "post");
    $post->sentPost($_SESSION["userid"], $post_text, $myPublicFilePath);
    /* else {
        http_response_code(302);
        header("location: ../Landing.php");
        exit();
    } */
}