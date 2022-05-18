<?php
require_once "./db_connect.inc.php";

$db = new DB();
$bdd = $db->connectDb();

$friends = new Friends($bdd);

class Friends
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }
    public function FriendsExist($uid, $follower_id)
    {
        $request = $this->bdd->prepare("SELECT * FROM follower where user_id = ? AND follower_id = ?");
        $request->execute([$uid, $follower_id]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    public function AddFriends($uid, $follower_id)
    {
        $exist = $this->FriendsExist($uid, $follower_id);
        if ($exist) {
            return null;
        } else {
            $request = $this->bdd->prepare("INSERT INTO follower(user_id, follower_id) VALUES (?,?)");
            $request->execute([$uid, $follower_id]);
        }
    }
    public function accesUsername($follower_id)
    {
        $request = $this->bdd->prepare("SELECT username FROM users where user_id=?");
        $request->execute([$follower_id]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    public function ChannelExist($uid, $follower_uid)
    {
        $request = $this->bdd->prepare("SELECT * FROM chanel where user_id=? AND nom=?");
        $request->execute([$uid, $follower_uid]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    public function CreateChannel($uid,$follower_uid){
     $exist = $this->ChannelExist($uid,$follower_uid);
     if($exist){
         /* var_dump($follower_uid); */
         exit();
     }
     else {
         $request = $this->bdd->prepare("INSERT INTO chanel(user_id, nom) VALUES ($uid,$follower_uid)");
         $request->execute();
     }
     
    }
}
session_start();
$req = $bdd->prepare("SELECT COUNT(*) FROM follower WHERE user_id = ? OR follower_id =?");
$req->execute([$_SESSION["userid"], $_SESSION["userid"]]);
$res = $req->fetch(PDO::FETCH_ASSOC);
echo $res["COUNT(*)"];