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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/favorites.css" />
    <script src="js/jscript.js"></script>
</head>

<body>
    <main class="homeMain">
        <div class="homeWrapper">
            <header class="headr">
                <h1>header</h1>
            </header>
            <div class="userInfo">
                <h1>User Information</h1>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
            </div>
            <div class="searchBox"><input type="text" placeholder="SEARCH BOX FOR Paintings" name="pSearch"></div>
            <div class="favPaint">
                <h1>Favorite Paintings</h1>
                <div class="paintItems">
                    <?php
                    if (!isset($_SESSION['favorites'])) {
                        echo "<h1>You don't have favorites set.</h2>";
                    } else {
                        foreach ($_SESSION['favorites'] as $fave) {
                            displayThumbPaint($fave);
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="likePaint">
                <h1>Paintings You May Like</h1>
                <div class="paintItems">
                    <div class="square"></div>
                    <div class="square"></div>
                    <div class="square"></div>
                    <div class="square"></div>
                    <div class="square"></div>
                    <div class="square"></div>
                    <div class="square"></div>
                    <div class="square"></div>
                </div>
            </div>
    </main>
</body>

</html>