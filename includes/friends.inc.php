<?php 
$db = new DB();
$bdd ->connectDb();

$friends = New Friends($bdd);

class Friends
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function AddFriends($uid, $follower_id)
    {

     $request = $this->bdd->prepare("INSERT INTO follower(user_id, $follower_id) VALUES (?,?)" );
     $request->execute([$uid,$follower_id]);
     return true;

    }
}

?>