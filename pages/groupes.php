<?php
require "./components/navbar.php";
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
?>
<main id="Landing">
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
                <span id="friends"></span>
                <span>Friends</span>
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