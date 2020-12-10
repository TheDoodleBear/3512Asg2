<?php
class DatabaseConn
{
    /* Returns a connection object to a database */
    public static function establishConn($param = array())
    {
        $dbConn = $param[0];
        $user = $param[1];
        $pass = $param[2];
        //Set pdo variable as PHP Data Object with parameters passed
        $pdo = new PDO($dbConn, $user, $pass);
        //Sets attributes on the database handles
        $pdo->setAttribute(
            //Error reporting
            PDO::ATTR_ERRMODE,
            //Throw exception if encountered
            PDO::ERRMODE_EXCEPTION
        );
        $pdo->setAttribute(
            //Set default fetch mode
            PDO::ATTR_DEFAULT_FETCH_MODE,
            //Tell PDO to return the result as an associative array.
            PDO::FETCH_ASSOC
        );
        return $pdo;
    }

    // Runs the specified SQL query using the passed connection and the passed array of parameters (null if none)

    public static function runQuery($connection, $sql, $param = array())
    {
        // Ensure parameters are in an array
        if (!is_array($param)) {
            $param = array($param);
        }
        //Set null if not an array
        $statement = null;
        if (count($param) > 0) {
            // Use a prepared statement if parameters
            $statement = $connection->prepare($sql);
            $executedOk = $statement->execute($param);
            if (!$executedOk) throw new PDOException;
        } else {
            // Execute a normal query
            $statement = $connection->query($sql);
            if (!$statement) throw new PDOException;
        }
        return $statement;
    }
}

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
    $sql = "SELECT PaintingID, Paintings.ArtistID AS ArtistID, FirstName, LastName, Paintings.GalleryID as GalleryID, GalleryName, 
    ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, 
    Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, 
    WikiLink, JsonAnnotations FROM (( Paintings 
    INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID )
    INNER JOIN Galleries ON Galleries.GalleryID = Paintings.GalleryID)";
    return $sql;
}

function addSortAndLimit($sqlOld)
{
    $sqlNew = $sqlOld . " ORDER BY YearOfWork limit 20";
    return $sqlNew;
}

function findPainting($search)
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = getPaintingSQL();
        $sql .= " WHERE PaintingID LIKE ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, '%' . $search . '%');
        $statement->execute();
        $paintings = $statement->fetch(PDO::FETCH_ASSOC);
        $pdo = null;
        return $paintings;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function pAnnotation($pID)
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT JsonAnnotations FROM Paintings";
        $sql .= " WHERE PaintingID LIKE ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, '%' . $pID . '%');
        $statement->execute();
        $paintings = $statement->fetch(PDO::FETCH_ASSOC);
        $pdo = null;
        return $paintings;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function displayPainting($painting)
{ // forward slash removed for testing on ryan's instance on /img/
    echo "<div class='pImg'><img src='img/paintings/full/" . $painting['ImageFileName'] . ".jpg' alt='" . $painting['Title'] . "' /></div>";
    echo "<div class='pInfo'>";
    echo "<h2>" . $painting['Title'] . "</h2>";
    echo "<button class='btnAddFav'><a href='addToFavorites.php?id=" . $painting['PaintingID'] . "'>Add to Favorites</a></button>";
    echo "<label>" . $painting['FirstName'] . " " . $painting['LastName'] . "</label>";
    echo "<label>" . $painting['GalleryName'] . ", " . $painting['YearOfWork'] . "</label>";
    echo "</div>";
    echo "<div class='pTabs'>";
    echo "<div id='pButtons'>";
    echo "<button class='btnDesc btnSelected'>Description</button>";
    echo "<button class='btnDet '>Detail</button>";
    echo "<button class='btnColr '>Color</button>";
    echo "</div>";
    echo "<div class='pDesc dBox btnSelected'>";
    echo "<p>" . $painting['Description'] . "</p>";
    echo "</div>";
    echo "<div class='pDet dBox '>";
    echo "<label>Medium</label><span>" . $painting['Medium'] . "</span>";
    echo "<label>Width</label><span>" . $painting['Width'] . "</span>";
    echo "<label>Height</label><span>" . $painting['Height'] . "</span>";
    echo "<label>Copyright</label><span>" . $painting['CopyrightText'] . "</span>";
    echo "<label>WikiLink</label><a href='" . $painting['WikiLink'] . "'>" . $painting['WikiLink'] . "</a>";
    echo "<label>Museum Page</label><a href='" . $painting['MuseumLink'] . "'>" . $painting['MuseumLink'] . "</a>";
    echo "</div>";
    echo "<div class='pColr dBox '>";
    echo "<div id='colorContainer'>";
    $JsonAnnotations = $painting['JsonAnnotations'];
    //encodes the string as an Array
    $arrayOfAnnotations = json_decode($JsonAnnotations, true);
    //creates an array with just the dominant colors array info
    $dominantColors = $arrayOfAnnotations["dominantColors"];
    //loops through the array and outputs the color name and a span with background color set as current color
    foreach ($dominantColors as $detail) {
        echo "<div class='squares'>";
        echo "<span>" . $detail['name']. "</span> <span>" . $detail['web'] . "</span>" . "<div class='colorSquare' style='background-color: " . $detail['web'] . "'> </div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

function displaybtnAddFav(){
    if (isset($_SESSION['key'])){

    }
}