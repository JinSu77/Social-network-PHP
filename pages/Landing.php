<?php
require "./components/header.php";
require "./components/navbar.php";
include_once("./includes/Post.inc.php");
include_once("./includes/Post.php");
include_once("./includes/db_connect.inc.php");
?>
<main id="Landing">
    <? #Chaque section est à remplacer par vos parties 
    ?>
    <div class="left column">
        <section class="UserProfile">
            <img src="#" alt="" id="bannerimg">
            <img src="#" alt="" id="userpfp">
            <span id="username">Loading</span>
            <p id="userbio">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                neque voluptates maiores.</p>
            <span class="userfollower">
                <p>69420</p>
            </span>
            <span class="userfollows">
                <p>69420</p>
            </span>
        </section>
        <section class="UserGroupe">Groupes</section>
    </div>
    <div class="mid column">
        <section class="CreatePost">
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST") {
                    $post = new Post($bdd);
                    $post_text = filter_input(INPUT_POST, "post");
                    $post_img = filter_input(INPUT_POST, "createpostImg");
                    $result = $post->sentPost( $_SESSION["userid"], $post_text, $post_img);
                    print_r($_POST);
                }
            ?>
            <form method="post" action="#">
                <div class="top">
                    <img src="#" alt="" class="pfp">
                    <input type="text" name="post" id="createpostinput" placeholder="What's happenning ?">
                </div>
                <div class="bottom">
                    <input type="file" name="createpostImg" id="createpostImg" placeholder="Image">
                    <button type="submit" value="post">Send post</button>
                </div>
            </form>
        </section>
        <section class="Flux">Flux de post</section>
    </div>
    <div class="right column">
        <?php require_once "./components/recentmessages.php"; ?>
    </div>
    <?php #Pour accéder au Login/Signup retirer /pages/Landing.php et remplacer le par /Login.php
    ?>
</main>