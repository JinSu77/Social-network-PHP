<?php
$db = new DB();
$bdd = $db->connectDb();

$profile = new Profile($bdd);

class Profile
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }
    public function NewUsernameExist($name)
    {
        $request = $this->bdd->connectDb()->prepare("SELECT * FROM users WHERE username = ?;");
        $request->execute([$name]);
        $resultat = $request->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            return $resultat;
        } else {
            return false;
        }
    }
    // envoyer les donner du profile
    public function ModifyUsername($username)
    {
        $NewuidExist = $this->NewUsernameExist($username);

        if ($NewuidExist !== false) {
            header("location: ../landing.php?error=usersnamealreadyexist");
            exit();
        }
        $request = $this->bdd->prepare("UPDATE users SET username = ? WHERE id = ? ");
        $request->execute([$username, $_SESSION["userid"]]);
        $_SESSION["useruid"] = $username;
    }
    public function ModifyBio($bio)
    {
        $request = $this->bdd->prepare("UPDATE users SET bio = ? WHERE id = ? ");
        $request->execute([$bio, $_SESSION["userid"]]);
        $_SESSION["useruid"] = $bio;
    }
    public function DeleteAllPOST()
    {
        $request = $this->bdd->prepare("DELETE FROM post where user_id= ?");
        $request->execute([$_SESSION["userid"]]);
    }
    public function DeleteAllFollow()
    {
        $request = $this->bdd->prepare("DELETE FROM follower where user_id= ?");
        $request->execute([$_SESSION["userid"]]);
    }
    //supprimé un profile 
    public function DeleteUser()
    {
        $delete = $this->DeleteAllFollow();
        $deleteP =$this->DeleteAllPOST();
        $request = $this->bdd->prepare("DELETE FROM users where id = ?");
        $request->execute([$_SESSION["userid"]]);
    }
    /* Permet d'avoir une bio */
    public function getUserBio()
    {
        $sqlReq = "SELECT bio FROM users WHERE id=?";
        $reqSQL = $this->bdd->prepare($sqlReq);
        $reqSQL->execute([$_SESSION["userid"]]);
        $resultat = $reqSQL->fetch(PDO::FETCH_ASSOC);
    }
}