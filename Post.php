<?php

class Post {
    public function __construct($bdd){
        $this-> bdd = $bdd;
        $this->connect = $this->bdd->connectDb()//function pour se connecter a la base de donne

    }
    // envoyer le post dur la bd
    public function sentPost($post_text,$post_img,$post_date,$user_id,$type){
        $request = prepare("INSERT INTO `Post`(`user_id`,`post_text`,`post_img`,`post_date`,`type` VALUES (?,?,?,now(),?)");
        $request -> execute([$user_id,$post_text,$post_img,$post_date,$type]);
        return true;
    }
    // recupere tous les post possible
    public function getPostbyIdPost($id){
        $request = $this->prepare("SELECT * post.id FROM Post INNER JOIN users ON Post.user_id = user.id WHERE Post.id = ? ");
        $request-> execute([$id]);
        $resultat = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    }
    //recuper les 3 dernier post de l'utilisateur
    public function  getLastPost($user_id) {
        $request = $this->prepare("SELECT * post.id FROM Post INNER JOIN users ON Post.user_id = user.id WHERE user.id = ? ORDER BY Post.post_date  DESC LIMIT 3");
        $request-> execute([$id]);
        $resultat = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePost($id){
        $request = $this->prepare("DELETE FROM Post where id = ? ");
        $request-> execute([$id]);
        return true ;
    }
}


/>
