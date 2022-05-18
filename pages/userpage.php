<?php
session_start();
$id = $_GET["id"];
$username = $_GET["username"];
require_once realpath(__DIR__ . '/../includes/db_connect.inc.php');
include_once("../includes/functions.inc.php");

?>
<section class="userPage">
    <div class="left column">
        <section class="UserProfile">
            <img src="#" alt="" id="bannerimg">
            <?php afficherMonImageDeProfil($_GET['id']) ?>
            <span id="username">
                <?php echo $username ?>
            </span>
            <p id="userbio">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                neque voluptates maiores.</p>
            <span class="stats">
                <span>Friends</span>
                <button onclick="addUser(<?php echo $username . ',' . $id ?>)">Follow User</button>
            </span>
        </section>
        <section class="UserGroupe">Groupes</section>
    </div>
</section>