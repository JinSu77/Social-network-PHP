<?php
require "./components/header.php" ?>
<div class="logSign-board">

    <section class="Login-Form">
        <form action="./includes/Login.inc.php" method="POST">
            <h1>Login</h1>
            <div class="uid">
                <label for="username">Your username/Email</label>
                <input type="text" name="uid" id="">
            </div>
            <div class="password">
                <label for="password">Your password</label>
                <input type="password" name="pwd" id="">
            </div>
            <?php
            // Si erreur dans l'uri on affiche un message d'erreur dans le form
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'wrongLogin') {
                    echo "<p class='error'>One of the two fields is wrong</p>";
                } else if ($_GET['error'] == 'emptyinput') {
                    echo "<p class='error'>Fill up all the fields</p>";
                }
            }
            ?>
            <button type="submit" name="submit">Login</button>
            <a href="signUp.php">Do you want to create an account instead ?</a>
        </form>

    </section>
</div>