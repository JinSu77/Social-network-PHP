<?php
$db = new DB();
$bdd = $db->connectDb();

$post = new Post($bdd);
class Post
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }
    // envoyer le post dur la bd
    public function sentPost($user_id, $post_text, $post_img)
    {

        $request =  $this->bdd->prepare("INSERT INTO post(user_id,post_text,post_img,post_date) VALUES (?,?,?,now())");
        $request->execute([$user_id, $post_text, $post_img]);
        return true;
    }
    // recupere to les post possible
    public function getPostbyIdPost($id)
    {
        $request =  $this->bdd->prepare("SELECT Post.id FROM Post INNER JOIN users ON Post.user_id = users.id WHERE Post.id = ? ");
        $request->execute([$id]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
    }
    //recuper les 3 dernier post de l'utilisateur
    public function  getLastPost($uid)
    {
        $request = $this->bdd->prepare("SELECT users.id FROM Post INNER JOIN users ON Post.user_id = users.id WHERE users.id = ? ORDER BY Post.post_date  DESC LIMIT 3");
        $request->execute([$uid]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePost($id)
    {
        $request =  $this->bdd->prepare("DELETE FROM Post where id = ? ");
        $request->execute([$id]);
        return true;
    }
    public function uploadPhotoPost(){

    }

}