<?php
require_once '../includes/dbconfig.inc.php';
require_once '../includes/db-class.inc.php';
// Tell the browser to expect JSON rather than HTML
header('Content-type: application/json');
// indicate whether other domains can use this API
header("Access-Control-Allow-Origin: *");
try {
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));

    $dbConnect = new PaintingDB($conn);
    // If the right query string is present and is not empty process Data
    if (isset($_GET['gallery']) && !empty($_GET['gallery'])) {

        $paintings = $dbConnect->getPaintingforGal($_GET["gallery"]);
    // If the right query string is present and is empty show ID missing
    } else if (isset($_GET['gallery']) && empty($_GET['gallery'])) {

        $paintings =  'Missing Gallery ID';
    } else {
        // Display if none of the above matches. 
        $paintings =  'Missing or Incorrect Query String';
    }
    // Return JSON string 
    echo json_encode($paintings, JSON_NUMERIC_CHECK);

    // close the connection to the database
    $conn = null;
} catch (Exception $e) {
    die($e->getMessage());
}