<?php 
$db = new DB();
$bdd= $db->connectDb();

$post = new Post($bdd);
class Post {
    public function __construct($bdd){
        $this-> bdd = $bdd;

    }
    // envoyer le post dur la bd
    public function sentPost($post_text,$post_img,$post_date,$user_id,$type){
        $request =  $this->bdd->prepare("INSERT INTO Post(user_id,post_text,post_img,post_date,type VALUES (?,?,?,now(),?)");
        $request -> execute([$user_id,$post_text,$post_img,$post_date,$type]);
        return true;
    }
    // recupere to les post possible
    public function getPostbyIdPost($id){
        $request =  $this->bdd->prepare("SELECT Post.id FROM Post INNER JOIN users ON Post.user_id = users.id WHERE Post.id = ? ");
        $request-> execute([$id]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
    }
    //recuper les 3 dernier post de l'utilisateur
    public function  getLastPost($user_id) {
        $request = $this->bdd->prepare("SELECT users.id FROM Post INNER JOIN users ON Post.user_id = users.id WHERE users.id = ? ORDER BY Post.post_date  DESC LIMIT 3");
        $request-> execute([$id]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePost($id){
        $request =  $this->bdd->prepare("DELETE FROM Post where id = ? ");
        $request-> execute([$id]);
        return true ;
    }
}

/>