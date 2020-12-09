<?php
require_once 'includes/dbconfig.inc.php';
require_once 'includes/db-class.inc.php';
session_start();

if (isset($_SESSION['CustID'])) {
    header("Location: home.php");
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
    <link rel="stylesheet" type="text/css" href="css/style.php" media="screen"/>
    <style>
        <?php #include "./css/style.css" ?>
    </style>
    <script src="js/jscript.js"></script>
</head>

<body>
<main id="indexPage">
        <div class="heroWrapper1">
            <form class="indexForm" action="login.php" method="post">
                <div class="frmBtn">
                    <button type="submit" >Login</button>
                    <button type="submit" formaction="signup.php">Join</button>
                </div>
                <input type="text" placeholder="SEARCH BOX FOR Paintings" name="pSearch">
            </form>
            <span id="imgCred">Photos by <a href="https://unsplash.com/@deuxdoom?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Eric Park</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
        </div>
    </main>
</body>

</html>