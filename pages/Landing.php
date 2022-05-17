<?php
require "./components/header.php";
require "./components/navbar.php";
require_once("./includes/db_connect.inc.php");
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
        <?php require "./components/Flux.php" ?>
    </div>
    <div class="right column">
        <?php require_once "./components/recentmessages.php"; ?>
    </div>
</main>