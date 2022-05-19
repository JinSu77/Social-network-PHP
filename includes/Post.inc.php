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
        // foreach ($resultat as $values){

        // }
        var_dump($resultat);
    }
    //recuper posts de l'utilisateur
    //TODO : Ajouter les posts des amis dans la liste
    public function getLastPost($uid)
    {
        $request = $this->bdd->prepare("
            SELECT username, post_text , post_img , post_date 
            FROM Post 
            INNER JOIN users ON Post.user_id = users.id
            WHERE users.id IN(
                (
                    SELECT user_id FROM follower
                    WHERE follower_id = :id
                ) UNION (
                    SELECT follower_id FROM follower
                    WHERE user_id = :id
                )
            )
            OR users.id = :id
            ORDER BY Post.post_date  DESC ");
        $request->execute([":id" => $uid]);
        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    public function deletePost($id)
    {
        $request =  $this->bdd->prepare("DELETE FROM Post where id = ? ");
        $request->execute([$id]);
        return true;
    }
    public function uploadPhotoPost()
    {
    }
}