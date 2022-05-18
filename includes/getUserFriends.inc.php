<?php
session_start();
$req = $bdd->prepare("SELECT COUNT(*) FROM follower WHERE user_id = ? OR follower_id =?");
$req->execute([$_SESSION["userid"], $_SESSION["userid"]]);
$res = $req->fetch(PDO::FETCH_ASSOC);
echo $res["COUNT(*)"];