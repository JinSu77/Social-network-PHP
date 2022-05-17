<?php
require_once "./components/header.php" ?>

<div class="welcome-page">
    <?php
    if (isset($_SESSION["useruid"])) {
        @require "./pages/Landing.php";
    } else {
        @require "./Login.php";
    }
    ?>
</div>
</body>

</html>