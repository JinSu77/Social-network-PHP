<?php
$id = $_GET["id"];
$username = $_GET["username"];
require("./components/header.php");
require("./components/navbar.php");
include_once("./includes/functions.inc.php");
?>
<section class="userPage">
    <section class="UserProfile">
        <img src="#" alt="" id="bannerimg">
        <?php afficherMonImageDeProfil($id) ?>
        <span id="username">
            <?php echo $username ?>
        </span>
        <p id="userbio">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            neque voluptates maiores.</p>
        <span class="stats">
            <span id="friends"></span>
            <span>Friends</span>
            <button onclick="addUser(<?php echo '`' . $username . '`,' . $id ?>)">Follow User</button>
        </span>
    </section>
    <section class="UserGroupe">Groupes</section>
</section>

<script>
fetch("./includes/friends.inc.php", {
        method: "GET",
    })
    .then((resp) => resp.text())
    .then((res) => {
        document.getElementById("friends").innerText = res;
    })
</script>