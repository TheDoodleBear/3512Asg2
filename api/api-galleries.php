<?php
// include support files    
require_once 'dbconfig.inc.php';
require_once 'db-class.inc.php';

// Browser shoud expect JSON rather than HTML
header('Content-type: application/json');

// Allow other domains to use this API outside local
header('Access-COntrol-Allow-Origin: *');

try {
    // establish connection to database
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));

    // create array containing all galleries information
    $galleries = getAllGalleries($conn);

    /* if paintID parameter is set, galleries is an array with a single painting's information
    Note: that paintID key may need to be changed depending on use in galleries.php and/or single-painting.php
    */
    if (isset($_GET['paintID'])) {
        $paintID = $_GET['paintID'];
        $galleries = getSinglePainting($conn, $paintID);
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

    // method that returns base SQL statement executed on Gallery table as an associative array
    public function getAll()
    {
        $sql = self::$baseSQL;
        $statement = DatabaseConn::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }

    // returns a single painting information for painting that matches the paintingID parameter
    public function getSinglePainting($paintingID)
    {
        $sql = getPaintSQL();
        $sql = $sql . " WHERE Paintings.PaintingID =?";
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($paintingID));
        return $statement->fetchAll();
    }
}

// create the SQL statement to select the needed painting details from Paintings, Artist & Galleries tables
function getPaintSQL()
{
    $sql = "SELECT PaintingID, Paintings.ArtistID AS ArtistID, FirstName, LastName, Paintings.GalleryID as GalleryID, 
    ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, 
    Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, 
    WikiLink, JsonAnnotations FROM (( Paintings 
    INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID )
    INNER JOIN Galleries ON Galleries.GalleryID = Paintings.GalleryID)";
    return $sql;
}

// helper function that returns all galleries from a new GalleryDB connection object
function getAllGalleries($connection)
{
    $galleriesGateway = new GalleryDB($connection);
    $galleries = $galleriesGateway->getAll();
    return $galleries;
}

// helper function thatreturns a painting from a new GalleryDB connection object
function getSinglePainting($connection, $ID)
{
    $galleriesGateway = new GalleryDB($connection);
    $painting = $galleriesGateway->getSinglePainting($ID);
    return $painting;
}
