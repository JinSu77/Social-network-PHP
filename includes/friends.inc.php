<?php
require_once "./db_connect.inc.php"; 

$db = new DB();
$bdd = $db->connectDb();

$friends = New Friends($bdd);

class Friends
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }
    public function FriendsExist($uid,$follower_id)
    {
     $request = $this->bdd->prepare("SELECT FROM follower where user_id = ? AND follower_id = ?");
     $request->execute([$uid]);
     $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AddFriends($uid, $follower_id)
    {
     $exit = $this->FriendsExist($uid,$follower_id);
     if(!isset($exit)){
         return null;
     }
     else {
         $request = $this->bdd->prepare("INSERT INTO follower(user_id, follower_id) VALUES (?,?)" );
        $request->execute([$uid,$follower_id]);
        return true;
    }
     
    }

    public function CreateChannel($uid){
     $request = $this->bdd->prepare("INSERT INTO chanel(user_id, )");

    }
}

?>