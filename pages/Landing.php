<?php
require "./components/header.php";
require "./components/navbar.php";
include_once("./includes/Post.inc.php");
include_once("./includes/Post.php");
include_once("./includes/db_connect.inc.php");
include_once("./includes/profile.inc.php");
include_once("./includes/functions.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profil = uploadMaPhoto($myFilePath, $id);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profil = afficherPostImage($myFilePath, $id);
}

echo $_FILES['profilPicture']['tmp_name'];
?>
<main id="Landing">
    <? #Chaque section est à remplacer par vos parties 

    ?>
    <div class="left column">
        <section class="UserProfile">
            <img src="#" alt="" id="bannerimg">
            <?php afficherMonImageDeProfil($id) ?>
            <form method="post" action="" enctype="multipart/form-data">
                <button type="submit">Changer</button>
                <input type="file" name="profilPicture"><br>
            </form>
            <span id="username">
                <?php echo $_SESSION["useruid"] ?>
            </span>
            <p id="userbio">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                neque voluptates maiores.</p>
            <span class="stats">
                <span class="userfollower">
                    <p>69420</p>
                </span>
                <span class="userfollows">
                    <p>69420</p>
                </span>
            </span>

        </section>
        <section class="UserGroupe">Groupes</section>
    </div>
    <div class="mid column">
        <section class="CreatePost">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $post = new Post($bdd);
                $post_text = filter_input(INPUT_POST, "post");
                $post_img = filter_input(INPUT_POST, "createpostImg");
                $result = $post->sentPost($_SESSION["userid"], $post_text, $post_img);
/*                 $maPhoto = "createpostImg";
                PostMaPhoto($maPhoto); */
            }
            ?>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="top">
                <?php afficherMonImageDeProfil($id) ?>
                    <input type="text" name="post" id="createpostinput" placeholder="What's happenning ?">
                </div>
                <div class="bottom">
                    <input type="file" name="createpostImg" id="createpostImg" placeholder="Image">
                    <button type="submit" value="post">Send post</button>
                </div>
            </form>
        </section>
        <section class="Flux">
            <div class="all-posts">
                <div class="main-post">
                    <div class="header-post">
                        <div class="profile-post">
                            <a class="picture-post" href="/search?query=%40{{this.name}}">&nbsp;</a>
                            <div class="name-date-post">
                                <a href="/search?query=%40{{this.name}}" class="name-post">{{this.name}}</a>
                                <div class="date-post">{{this.relative_time}}</div>
                            </div>
                            <i class="material-icons">more_vert</i>
                        </div>
                    </div>
                    <div class="content-post">
                        {{{this.post}}} <a class="hashtag" href="#">test</a> <a class="hashtag" href="#">wohoooOOO</a>
                        aha <a class="person" href="#">profile</a>
                    </div>
                    <div class="bottom-post">
                        <div class="like-post"><i class="material-icons">thumb_up</i></div>
                        <div class="comment-post"><i class="material-icons">comment</i></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="right column">
        <?php require_once "./components/recentmessages.php"; ?>
    </div>
    <?php
    #Pour accéder au Login/Signup retirer /pages/Landing.php et remplacer le par /Login.php
    ?>
</main>