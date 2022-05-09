<?php
// Entête du site
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Paint en mieux</title>
    <script>
    const ThemeToggle = () => {
        if (window.location == "http://localhost/projet-backend/") {
            window.location = "http://localhost/projet-backend/?theme=dark"
        } else if (window.location == "http://localhost/projet-backend/?theme=dark") {
            window.location = "http://localhost/projet-backend/"
        }
    }
    </script>
    <?php
    if (isset($_GET['theme']) && $_GET['theme'] == 'dark') {
        echo '<link rel="stylesheet" href="./styles/darkTheme/globals-dark.css" />';
    } else {
        echo '<link rel="stylesheet" href="./styles/globals.css" />';
    }
    ?>
</head>

<body>