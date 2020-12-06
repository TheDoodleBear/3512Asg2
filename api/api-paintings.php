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

/* Commented out as these functions are already included in the db-class.inc.php and I was getting Function naming errors, will delete after final testing
class PaintingDB
{
    public function __construct($connection)
    {
        $this->pdo = $connection;
    }

    public function getPaintingforGal($galleryID)
    {
        $sql = getPaintingSQL() . " WHERE Paintings.GalleryID=?";
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($galleryID));
        return $statement->fetchAll();
    }

    public function getTop20()
    {
        $sql = getPaintingSQL();
        $sql = addSortAndLimit($sql);
        $statement = DatabaseConn::runQuery(
            $this->pdo,
            $sql,
            null
        );
        return $statement->fetchAll();
    }
}



function getPaintingSQL()
{
    $sql = "SELECT PaintingID, Paintings.ArtistID AS ArtistID, FirstName, LastName, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, WikiLink, JsonAnnotations FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID  ";
    return $sql;
}

function addSortAndLimit($sqlOld)
{
    $sqlNew = $sqlOld . " ORDER BY YearOfWork limit 20";
    return $sqlNew;
}
*/