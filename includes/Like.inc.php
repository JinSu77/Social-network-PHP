<?php 
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');

$db = new DB();
$bdd = $db->connectDb();

$like = new Like($bdd)

class like
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function AddLike($id,$post_id,)
    {
        $request = $this->bdd->prepare("Ins")
    }
}

?>