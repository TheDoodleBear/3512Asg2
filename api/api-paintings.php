<?php
require_once 'dbconfig.inc.php';
require_once 'db-class.inc.php';
// Tell the browser to expect JSON rather than HTML
header('Content-type: application/json');
// indicate whether other domains can use this API
header("Access-Control-Allow-Origin: *");
try {
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));

    $dbConnect = new PaintingDB($conn);

    if (isCorrectQueryStringInfo("gallery"))
        $paintings = $dbConnect->getPaintingforGal($_GET["gallery"]);
    else if (isCorrectQueryStringInfo("painting"))
        $paintings = $dbConnect->getTop20Paint($_GET["painting"]);
    else
        $paintings = $dbConnect->getAll();

    echo json_encode($paintings, JSON_NUMERIC_CHECK);
} catch (Exception $e) {
    die($e->getMessage());
}

function isCorrectQueryStringInfo($param)
{
    if (isset($_GET[$param]) && !empty($_GET[$param])) {
        return true;
    } else {
        return false;
    }
}


class PaintingDB
{
    public function __construct($connection)
    {
        $this->pdo = $connection;
    }

    public function getAll()
    {
        $sql = getPaintingSQL();
        $statement = DatabaseConn::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }

    public function getPaintingforGal($galleryID)
    {
        $sql = getPaintingSQL() . " WHERE Paintings.GalleryID=?";
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($galleryID));
        return $statement->fetchAll();
    }

    public function getTop20Paint($paintID)
    {
        $sql = getPaintingSQL() . " WHERE Paintings.GalleryID=?";
        $sql = addSortAndLimit($sql);
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($paintID));
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
