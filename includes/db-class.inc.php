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
