<?php
require_once "./components/header.php" ?>

<div class="welcome-page">
    <div class="logSign-board">
        <?php
        //Si l'utilisateur est connecté on le renvoie directement sur le dashboard de ses projets
        // Sinon on affiche les options pour se connecter ou créer un compte
        //if (isset($_SESSION["useruid"])) {
        //    header('location: ./pages/Landing.php');
        //} else {
        //    echo '<div class="links"><a href="./signUp.php">Créer un compte</a>|<a href="./Login.php">Se connecter</a></div>';
        //}

        # On utilisera le code au dessus pour déterminer si l'utilisateur
        # est co ou pas et pour rediriger vers la bonne page
        @require "./pages/Landing.php"
        ?>
    </div>
</div>
</body>

</html>