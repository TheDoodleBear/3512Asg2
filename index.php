<?php
require_once 'includes/dbconfig.inc.php';
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
    <!-- <link rel="stylesheet" type="text/css" href="css/style.php" media="screen"/> -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/favorites.css" />
    <style>
        <?php include "./css/style.css" ?>
    </style>
    <script src="js/jscript.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['CustID'])) {
        displayHome($_SESSION['CustID']);
    } else {
        displayLogIn();
    }
    ?>

</body>

</html>