<?php
require_once 'includes/db-class.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="Lorenzo Young">
    <title>COMP 3512 Assign2</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/favorites.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/favorites.css" />
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <script src="js/jscript.js"></script>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Assignment2</label>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="galleries.php">Galleries</a></li>
            <li><a href="browse-paintings.php">Browse/Search Paintings</a></li>
            <li><a href="favorites.php">Favorites</a></li>
            <?php
            if (isset($_SESSION['CustID'])) {
                echo "<li><a href='/includes/logout.php'>LogOut</a></li>";
            } else {
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
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
                    displayThumbPaint($fave, "visible");
                }
            }

            ?>
    </main>



</body>

</html>