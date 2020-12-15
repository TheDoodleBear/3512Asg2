<?php

/// class for Gallery Database connections

class GalleryDB {
  
    // database connection and table name
    private $conn;
    private $table_name = "galleries";
  
    // object properties
    public $GalleryID;
    public $GalleryName;
    public $GalleryNativeName;
    public $GalleryCity;
    public $GalleryAddress;
    public $GalleryCountry;
    public $Latitude;
    public $Longitude;
    public $GalleryWebSite;
    public $FlickrPlaceID;
    public $YahooWoeID;
    public $GooglePlaceID;
  
    // read galleries
    private static $baseSQL = "SELECT * FROM Galleries";

    // constructor for connection object property
    public function __construct($connection)
    {
        $this->pdo = $connection;
    }

    // returns all galleries from the galleries table
    public function getAll($page_number = NULL)
    {
        $results_per_page = 6;  

        $sql = self::$baseSQL;
        $statement = DatabaseConn::runQuery($this->pdo, $sql, null);
        $number_of_result = $statement->rowCount(); 
        
        //determine the total number of pages available  
        $number_of_page = ceil ($number_of_result / $results_per_page);  
        
        //determine which page number visitor is currently on  
        
        $page = $page_number;
        
        //determine the sql LIMIT starting number for the results on the displaying page  
        $page_first_result = ($page-1) * $results_per_page;  
    
        //retrieve the selected results from database   
        $query = "SELECT *FROM galleries LIMIT " . $page_first_result . ',' . $results_per_page;  
        $result = DatabaseConn::runQuery($this->pdo, $query, null);
        
        return array("result"=>$result->fetchAll(), "number_of_page"=>$number_of_page, 'current_page'=>$page);
    }

    // returns a single gallery from the galleries table that matches the GalleryID parameter
    public function getSingleGallery($galleryID)
    {
        $sql = self::$baseSQL;
        $sql = getGallerySQL($sql);
        $statement = DatabaseConn::runQuery($this->pdo, $sql, array($galleryID));
        return array("result"=>$result->fetchAll(), "all"=>$this->getAll(), 'paintings'=>$this->getAllPaintings());
    }
    public function getAllPaintings() {
        $sql = "SELECT * FROM Paintings";
        $statement = DatabaseConn::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }
}

// alter the SQL statement to select the matching Gallery from the Galleries tables
function getGallerySQL($oldSQL)
{
    $newSQL = $oldSQL . " WHERE GalleryID=?";
    return $newSQL;
}

?>