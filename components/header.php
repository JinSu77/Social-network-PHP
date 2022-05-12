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
    <script src="./js/main.js"></script>
    <?php
    if (isset($_GET['theme']) && $_GET['theme'] == 'dark') {
        echo '<link rel="stylesheet" href="./styles/globals-dark.css" />';
    } else {
        echo '<link rel="stylesheet" href="./styles/globals.css" />';
    }
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>