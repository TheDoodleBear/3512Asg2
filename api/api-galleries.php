<?php
// include support files    
require_once 'dbconfig.inc.php';
require_once 'db-class.inc.php';

// Browser shoud expect JSON rather than HTML
header('Content-type: application/json');

// Allow other domains to use this API outside local
header('Access-COntrol-Allow-Origin: *');

try {
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));

    $galleries = getAllGalleries($conn);

    if (isset($_GET['paintID'])) {
        $paintID = $_GET['paintID'];
        $galleries = getSinglePainting($conn, $paintID);
    }
    echo json_encode($galleries, JSON_NUMERIC_CHECK);

} catch (Exception $e) {
    die($e->getMessage());
}

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

    public function getSinglePainting($paintingID)
    {
        $sql = getPaintSQL();
        $sql = $sql . " WHERE Paintings.PaintingID =?";
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($paintingID));
        return $statement->fetchAll();
    }
}

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

function getAllGalleries($connection)
{
    $galleriesGateway = new GalleryDB($connection);
    $galleries = $galleriesGateway->getAll();
    return $galleries;
}

function getSinglePainting($connection, $ID)
{
    $galleriesGateway = new GalleryDB($connection);
    $painting = $galleriesGateway->getSinglePainting($ID);
    return $painting;
}
