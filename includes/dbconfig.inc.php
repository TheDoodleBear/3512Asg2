<?php
// Attempting to use Google Cloud SQL 
// define('DBHOST', getCloudSqlConnection(url, userName, password)');
// define('DBNAME', 'art');
// define('DBUSER', 'root');
// define('DBPASS', 'qtihn5qgdJKxIMHz');
// define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

// Restore these lines for local testing
// define('DBHOST', 'localhost');
// define('DBNAME', 'art');
// define('DBUSER', 'root');
// define('DBPASS', '');
// define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

// Config for Heroku Hosting 12/9/22:31
define('DBHOST', 'us-cdbr-east-02.cleardb.com');
define('DBNAME', 'Comp3512A2Dec07');
define('DBUSER', 'bde88340f4f08c');
define('DBPASS', 'b3c67720');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");
?>



