<?php
// Déconnection de l'utilisateur si rediriger sur cette page
session_start();
session_unset();
session_destroy();
// Renvoie vers l'index pour la reconnection où la création d'un compte
header("location: ../index.php");
exit();