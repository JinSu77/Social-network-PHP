<?php
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');


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

    public function ChannelExist($id, $follower_uid)
    {
        $request = $this->bdd->prepare("SELECT * FROM chanel where user_id=? AND nom=?");
        $request->execute([$id, $follower_uid]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    /* create the chanel where i will send the message */
    public function CreateChannel($id, $follower_uid)
    {
        $exist = $this->ChannelExist($id, $follower_uid);
        if ($exist) {
            /* var_dump($follower_uid); 
         exit(); */
            return null;
        } else {
            $request = $this->bdd->prepare("INSERT INTO chanel(user_id, nom) VALUES (?,?)");
            $request->execute([$id, $follower_uid]);
        }
    }
    public function ShowChanel($id)
    {
        $id = $_SESSION["userid"];
        $getChannels = $this->bdd->prepare("SELECT * FROM chanel WHERE user_id = ?");
        $getChannels->execute([$id]);
        $resultat = $getChannels->fetchAll(PDO::FETCH_ASSOC);
    }
}