<?php
// Attempting to use Google Cloud SQL 
// define('DBCONNECTION', getenv('MYSQL_DSN') );
// define('DBUSER', getenv('MYSQL_USER') );
// define('DBPASS', getenv('MYSQL_PASSWORD') );

define('DBHOST', 'localhost');
define('DBNAME', 'art');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");
?>



