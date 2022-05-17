<?php
require "./components/header.php" ?>
<div class="logSign-board">

    <section class="SignUp-Form">
        <form action="./includes/signUp.inc.php" method="POST">
            <h1>Sign Up</h1>
            <div class="email">
                <label for="email">Your email</label>
                <input type="email" name="email" id="">
            </div>
            <div class="username">
                <label for="username">Your username</label>
                <input type="text" name="username" id="">
            </div>

            <div class="password"><label for="password">Your password</label>
                <input type="password" name="password" id="">
            </div>
            <div class="passCheck"> <label for="pwdcheck">Repeat password</label>
                <input type="password" name="pwdcheck" id="">
            </div>

            <?php
            // Si erreur dans l'uri on affiche un message d'erreur dans le form
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinput') {
                    echo "<p class='error'>Fill all fields</p>";
                } else if ($_GET['error'] == 'InvalidUsername') {
                    echo "<p class='error'>Your username has an forbidden character</p>";
                } else if ($_GET['error'] == 'invalidEmail') {
                    echo "<p class='error'>Your email isn't valid</p>";
                } else if ($_GET['error'] == 'passwordAreDifferent') {
                    echo "<p class='error'>The password are not the same</p>";
                } else if ($_GET['error'] == 'usernameTaken') {
                    echo "<p class='error'>This username is taken</p>";
                } else if ($_GET['error'] == 'none') {
                    echo "<p class='error'>This username is taken</p>";
                }
            }
            ?>
            <button type="submit" name="submit">Sign Up</button>
            <a href="Login.php">Did you wanted to login instead ?</a>
        </form>
    </section>
</div>