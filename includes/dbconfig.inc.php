<?php
// Attempting to use Google Cloud SQL 
// define('DBCONNECTION', getenv('MYSQL_DSN') );
// define('DBUSER', getenv('MYSQL_USER') );
// define('DBPASS', getenv('MYSQL_PASSWORD') );

//define('DBHOST', 'localhost');
//define('DBNAME', 'art');
//define('DBUSER', 'root');
//define('DBPASS', '');
//define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");


define('DBHOST', 'us-cdbr-east-02.cleardb.com');
define('DBNAME', 'heroku_1df3cb0d0425735');
define('DBUSER', 'bde88340f4f08c');
define('DBPASS', 'b3c67720');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");
?>