<?php
// include support files    
require_once '../includes/dbconfig.inc.php';
require_once '../includes/db-class.inc.php';

// Browser shoud expect JSON rather than HTML
header('Content-type: application/json');

// Allow other domains to use this API outside local
header('Access-COntrol-Allow-Origin: *');

try {
    // establish connection to database
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));

    // create array containing all galleries information
    $galleries = getAllGalleries($conn);

    /* if ID parameter is set, galleries is an array with a single gallery's information
    Note: that paintID key may need to be changed depending on use in galleries.php and/or single-painting.php
    */
    if (isset($_GET['id'])) {
        $galleryID = $_GET['id'];
        $galleries = getGallery($conn, $galleryID);
    }
    // output the galleries array as JSON object
    echo json_encode($galleries, JSON_NUMERIC_CHECK);

    // close the connection to the database
    $conn = null;

} catch (Exception $e) {
    die($e->getMessage());
}

/// class for Gallery Database connections
class GalleryDB
{
    // variable for base SQL statement to return all columns from Galleries table 
    private static $baseSQL = "SELECT * FROM Galleries";

    // constructor for connection object property
    public function __construct($connection)
    {
        $this->pdo = $connection;
    }

    // returns all galleries from the galleries table
    public function getAll()
    {
        $sql = self::$baseSQL;
        $statement = DatabaseConn::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }

    // returns a single gallery from the galleries table that matches the GalleryID parameter
    public function getSingleGallery($galleryID)
    {
        $sql = self::$baseSQL;
        $sql = getGallerySQL($sql);
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($galleryID));
        return $statement->fetchAll();
    }
}

// alter the SQL statement to select the matching Gallery from the Galleries tables
function getGallerySQL($oldSQL)
{
    $newSQL = $oldSQL . " WHERE GalleryID=?";
    return $newSQL;
}

// helper function that returns all galleries from a new GalleryDB connection object
function getAllGalleries($connection)
{
    $galleriesGateway = new GalleryDB($connection);
    $galleries = $galleriesGateway->getAll();
    return $galleries;
}

// helper function that returns a gallery from a new GalleryDB connection object
function getGallery($connection, $ID)
{
    $galleriesGateway = new GalleryDB($connection);
    $gallery = $galleriesGateway->getSingleGallery($ID);
    return $gallery;
}
