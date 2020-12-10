<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    // does not exist, so initalize it
    $_SESSION["favorites"] = [];
}
// retrieve any existing favorites
$fav = $_SESSION["favorites"];

if (isset($_GET['id'])) {
    // now add passed painting ID to the array
    $fav[] = $_GET['id'];
}

//resave modified array back to session state
$_SESSION["favorites"] = $fav;

//redirect back to page that requested this
header("Location:" . $_SERVER["HTTP_REFERER"]);
