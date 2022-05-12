<?php
$db = new DB();
$bdd= $db->connectDb();

$post = new Post($bdd);

class Post {
    public function __construct($bdd){
        //function pour se connecter a la base de donne
        $this-> bdd = $bdd;
    }
    // envoyer le post dur la bd
    public function sentPost($connection,$post_text,$post_img,$post_date,$user_id,$type){
        $sql = "INSERT INTO `Post`(`user_id`,`post_text`,`post_img`,`post_date`,`type` VALUES (?,?,?,now(),?)";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql)){
           header("location: ../index.php?error=saMarchePas")
        }
        mysqli_stmt_bind_param($stmt,"sssss",);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        exit();
    }
    // recupere tous les post possible
    public function getPostbyIdPost($id){
        $sql ="SELECT * post.id FROM Post INNER JOIN users ON Post.user_id = user.id WHERE Post.id = ? ";
        $stmt = mysqli_stmt_init($connection);
        $
        $request-> execute([$id]);
        $resultat = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    }
    //recuper les 3 dernier post de l'utilisateur
    public function  getLastPost($user_id) {
        $request = $this->prepare("SELECT * post.id FROM Post INNER JOIN users ON Post.user_id = user.id WHERE user.id = ? ORDER BY Post.post_date  DESC LIMIT 3");
        $request-> execute([$id]);
        $resultat = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    }
    // supprime un post 
    public function deletePost($id){
        $sql ="DELETE FROM Post where id = ? ";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?error=saMarchePas")
         }
        mysqli_stmt_bind_param($stmt,"sssss",);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php")
        exit()
    }
}


/>
