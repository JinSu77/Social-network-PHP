<?php
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $getid = $_GET['id'];
    //!  changer la requetes en dessous pour récup les messages du channel et pas de l'utilisateur
    //* Le reste je te laisse gérer mais fait en sorte qu'on récup une array ou un objet
    $recupUser = $bdd->prepare('SELECT * FROM message WHERE id = ?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {
        if (isset($_POST['envoyer'])) {
            $message = htmlspecialchars($_POST['message']);
            $insererMessage = $bdd->prepare('INSERT INTO chanel(user_id,nom,messages)VALUES(?, ?, ?)');
            $insererMessage->execute([$_SESSION['id'],$nom,$messages]);
        }
    } else {
        echo "aucun user trouver";
    }
} else {
    echo "aucun id à était trouver";
}

