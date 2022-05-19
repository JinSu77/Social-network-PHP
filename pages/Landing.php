<?php
require "./components/navbar.php";
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
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
    <div id="modal">
        <form method="post" action="" enctype="multipart/form-data">
            <label for="modifyUsername">Username</label>
            <input id="username" value="<?php echo $_SESSION["useruid"] ?>" name="modifyUsername">
            <button type="submit">Changer</button>
            <input type="file" name="profilPicture"><br>
            <input style="width: 100%;
      height: 25vh;" id="userbio" value="" placeholder="Tell something about yourself....">
            <span class="action" onclick="toggleModal()">
                Cancel edit
            </span>
        </form>
    </div>
    <div class="left column">
        <section class="UserProfile">
            <img src="#" alt="" id="bannerimg">
            <?php afficherMonImageDeProfil($id) ?>
            <span id="username">
                <?php echo $_SESSION["useruid"] ?>
            </span>
            <p id="userbio">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                neque voluptates maiores.</p>
            <span class="stats">
                <span id="friends"></span>
                <span>Friends</span>
            </span>
            <span class="action" onclick="toggleModal()">
                Edit profile
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