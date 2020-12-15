<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here

require_once '../../includes/dbconfig.inc.php';
require_once '../../includes/db-class.inc.php';
include_once '../objects/galleries.php';


$data = json_decode(file_get_contents('php://input'), true);

// instantiate database and gallery object
try {
    // establish connection to database
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));

    // create array containing all galleries information
    $galleriesGateway = new GalleryDB($conn);
    $galleries = $galleriesGateway->getAll($data["Page"]);

    /* if ID parameter is set, galleries is an array with a single gallery's information
    Note: that paintID key may need to be changed depending on use in galleries.php and/or single-painting.php
    */
    if (isset($data['id'])) {
        $galleryID = $data['id'];
        $galleriesGateway = new GalleryDB($conn);
        $galleries = $galleriesGateway->getSingleGallery($galleryID);
    }
    // output the galleries array as JSON object
    echo json_encode($galleries, JSON_NUMERIC_CHECK);

    // close the connection to the database
    $conn = null;

} catch (Exception $e) {
    die($e->getMessage());
}



  
// no gallerys found will be here