<?php
require_once 'includes/dbconfig.inc.php';
require_once 'includes/db-class.inc.php';
session_start();
try {
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));
    // $conn = DatabaseConn::establishConn(array(DBCONNECTION, DBUSER, DBPASS));

    $dbConnect = new PaintingDB($conn);
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $painting = $dbConnect->findPainting($_GET['id']);
    }
    $conn = null;
} catch (Exception $e) {
    die($e->getMessage());
}


// if the the customer is logged in and the painting is not already a favorite display the add to favorites button
if (isset($_SESSION['favorites'])) {
    if (isFavorite($painting)) {
        // sets the default visibility to hidden fo
        $visibility = 'hidden';
    } else {
        $visibility = "visible";
    }
} else {
    $visibility = "visible";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="Lorenzo Young">
    <title>COMP 3512 Assign2</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/style.php" media="screen"/> -->
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/sng-paint-css.css" />
    <script src="js/sng-paint.js"></script>
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
    <main id="singlePaintPage">
        <div class="headr">
            <h1>Painting Details</h1>
        </div>
        <div class="paintContent">
            <?php
            // displayPainting($painting);
            displayPainting($painting, $visibility);
            ?>
        </div>
    </main>
</body>

</html>