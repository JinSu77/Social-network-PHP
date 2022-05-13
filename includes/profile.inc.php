<?php 
$db = new DB();
$bdd = $db->connectDb();

$post = new Profile($bdd);

class Profile
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }
    public function NewUsernameExist($name){
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
        $NewuidExist = $this->NewUsernameExist($$username);

        if ($NewuidExist !== false){
            header("location: ../landing.php?error=usersnamealreadyexist");
            exit();
        }
        $request = $this->bdd->prepare("UPDATE users SET username = ? WHERE id = ? ");
        $request -> execute([$username, $_SESSION["userid"]]);
        $_SESSION["useruid"] = $username; 
    }
    public function ModifyBio($bio){
        $request = $this->bdd->prepare("UPDATE users SET bio = ? WHERE id = ? ");
        $request -> execute([$bio, $_SESSION["userid"]]);
        $_SESSION["useruid"] = $bio; 
    }
    public function uploadMaPhoto(){
        $error = 0;
        if(isset($_FILES['profilPicture']) && $_FILES['profilPicture']['error'] == 0){
            // La size de la photo de profil doit être inférieur à 10mo.
            if($_FILES['profilPicture']['size'] <= 10000000){
                $imageInfos = pathinfo($_FILES['profilPicture']['name']);
                $extensionImage = $imageInfos['extension'];
                $extensionAutorisee = array('png', 'jpeg', 'jpg', 'gif');
            
    
                if(in_array($extensionImage, $extensionAutorisee)){
                    $fileName = time().rand().'.'.$extensionImage;
                    $myFilePath = "../upload/".$fileName;
                    move_uploaded_file($_FILES['profilPicture']['tmp_name'], $myFilePath);
                    
                }else {
                    $error = 1;
                }
    
            } else {
                $error = 1;
            }
        }else{
            $error = 1;
        }
    
        if($error == 1){
            echo "Erreur, votre photo n'a pas été upload.";
            $error = 0;
        } /* else {
            http_response_code(302);
            header("location: ../Landing.php");
            exit();
        } */
    }

}

?>