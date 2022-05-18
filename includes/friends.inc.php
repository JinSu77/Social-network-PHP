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
     $request = $this->bdd->prepare("SELECT * FROM follower where user_id = ? AND follower_id = ?");
     $request->execute([$uid, $follower_id]);
     $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
     return $resultat;
    }
    public function AddFriends($uid, $follower_id)
    {
     $exist = $this->FriendsExist($uid,$follower_id);
     if($exist){
     //   exit();
         return null;
     }
     else {
         $request = $this->bdd->prepare("INSERT INTO follower(user_id, follower_id) VALUES (?,?)" );
        $request->execute([$uid,$follower_id]);
        //echo "<script>console.log(ououi) <script/>";
    }
   
     
    }
    
    public function accesUsername($follower_id)
    {
     $request = $this->bdd->prepare("SELECT username FROM users where user_id=?");
     $request ->execute([$follower_id]);
     $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
     return $resultat;   
    }

    public function ChannelExist($uid,$follower_uid){
        $request = $this->bdd->prepare("SELECT * FROM chanel where user_id=? AND nom=?");
        $request->execute([$uid, $follower_uid]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    public function CreateChannel($uid,$follower_uid){
     $exist = $this->ChannelExist($uid,$follower_uid);
     if($exist){
         return null;
     }
     else {
         $request = $this->bdd->prepare("INSERT INTO chanel(user_id, nom) VALUES (?,?)");
         $request->execute([$uid,$_SESSION["follower_uid"]]);
     }
     
    }
     public function ShowChannel($chanel_id){

     }
}

?>