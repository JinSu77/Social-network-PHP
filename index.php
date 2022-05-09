<?php
require_once "./components/header.php" ?>

<div class="welcome-page">
    <div class="logSign-board">
        <h2>Bienvenue sur</h1>
            <h1>Paint en mieux</h1>
            <?php
            //Si l'utilisateur est connecté on le renvoie directement sur le dashboard de ses projets
            // Sinon on affiche les options pour se connecter ou créer un compte
            if (isset($_SESSION["useruid"])) {
                header('location: ./pages/Landing.php');
            } else {
                echo '<div class="links"><a href="./signUp.php">Créer un compte</a>|<a href="./Login.php">Se connecter</a></div>';
            }
            ?>
    </div>
</div>
</body>

</html>