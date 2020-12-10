<?php
require_once 'includes/db-class.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="">
    <title>COMP 3512 Assign1</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/favorites.css" /> -->
    <style>
        <?php include "./css/favorites.css" ?>
    </style>
    <script src="js/jscript.js"></script>
</head>

<body>

    <main id="favoritesPage">
        <div class="headr">
            <h1>Favorites</h1>
        </div>
        <div class="favContent">
            <?php

            if (!isset($_SESSION['favorites'])) {
                echo "<h1>You don't have favorites set.</h2>";
            } else {
                foreach ($_SESSION['favorites'] as $fave) {
                   displayThumbPaint($fave);
                }
            }

            ?>
    </main>



</body>

</html>