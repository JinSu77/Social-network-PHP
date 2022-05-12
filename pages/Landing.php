<?php
require "./components/header.php";
require "./components/navbar.php";
?>
<main id="Landing">
    <? #Chaque section est à remplacer par vos parties 
    ?>
    <div class="left column">
        <section class="UserProfile">
            <img src="#" alt="" id="bannerimg">
            <img src="#" alt="" id="userpfp">
            <span id="username"></span>
            <p id="userbio"></p>
            <span class="userfollower"></span>
            <span class="userfollows"></span>
        </section>
        <section class="UserGroupe">Groupes</section>
    </div>
    <div class="mid column">
        <section class="CreatePost">
            <form action="#">
                <img src="#" alt="" class="pfp">
                <input type="text" name="createpostText" id="createpostinput" placeholder="What's happenning ?">
                <input type="file" name="createpostImg" id="createpostImg" placeholder="Image">
                <button type="submit">Send post</button>
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