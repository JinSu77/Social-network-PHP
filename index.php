<?php
require_once "./components/header.php" ?>

<div class="welcome-page">
    <div class="logSign-board">
        <?php
        //Si l'utilisateur est connecté on le renvoie directement sur le dashboard de ses projets
        // Sinon on affiche les options pour se connecter ou créer un compte
        if (isset($_SESSION["useruid"])) {
            @require "./pages/Landing.php";
        } else {
            @require "./Login.php";;
        }

        # On utilisera le code au dessus pour déterminer si l'utilisateur
        # est co ou pas et pour rediriger vers la bonne page
        ?>
    </div>
</div>
</body>

</html>