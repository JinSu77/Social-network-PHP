<?php
require "./components/header.php";
require "./components/navbar.php";
?>
<main id="Landing">
    <? #Chaque section est à remplacer par vos parties 
    ?>
    <div class="left column">
        <?php require "./components/profil.php; " ?>
        <section class="UserGroupe">Groupes</section>
    </div>
    <div class="mid column">
        <?php require "./components/createpost.php; " ?>
        <section class="Flux">Flux de post</section>
    </div>
    <div class="right column">
        <?php require "./components/recentmessages.php"; ?>
    </div>
    <?php #Pour accéder au Login/Signup retirer /pages/Landing.php et remplacer le par /Login.php
    ?>
</main>