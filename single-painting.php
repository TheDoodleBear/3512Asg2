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
// if (isset($_SESSION["CustID"])) {
if (isset($_SESSION['favorites'])) {
    if (isFavorite($painting)) {
        // sets the default visibility to hidden fo
        $visibility = 'hidden';
    } else {
        $visibility = "visible";
    }
}else {
    $visibility = "visible";
}
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="">
    <title>COMP 3512 Assign1</title>
    <!-- check ref path for styling page if there is an error in your instance -->
    <link rel="stylesheet" type="text/css" href="css/sng-paint-css.php" media="screen" />
    <!-- <style>
        <?php #include "./css/sng-paint-css.css" 
        ?>
    </style> -->
    <script src="js/sng-paint.js"></script>
</head>

<body>
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