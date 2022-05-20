<?php
require_once "./db_connect.inc.php";

if (isset($_GET["id"]) and !empty($_GET["id"])) {

    $getid = $_GET['id'];
    //!  changer la requetes en dessous pour récup les messages du channel et pas de l'utilisateur
    //* Le reste je te laisse gérer mais fait en sorte qu'on récup une array ou un objet
    $recupUser = $bdd->prepare('SELECT * FROM  chanel WHERE id = ?');
    $recupUser->execute([$getid]);
    if ($recupUser->rowCount() > 0) {
        if (isset($_POST['envoyer'])) {
            $message = htmlspecialchars($_POST['message']);
            $insererMessage = $bdd->prepare('INSERT INTO chanel(user_id,nom,)VALUES(?, ?)');
            $insererMessage->execute([$_SESSION['id'],$nom]);
        }
    } else {
        echo "aucun user trouver";
    }
} else {
    echo "aucun id à était trouver";
}

