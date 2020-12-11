<?php
require_once 'dbconfig.inc.php';
require_once 'db-class.inc.php';
try {
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));
    $dbConnect = new loginDB($conn);
    if (isset($_POST['submit'])) {
        if (empty($_POST['uname']) || empty($_POST['psw'])) {
            header("Location:http://database-comp3512-a2-dec8.herokuapp.com/login.php?error=empty");
            exit();
        } else {
            $userCred = $dbConnect->checkUser($_POST['uname']);
            if (!empty($userCred)) {
                if (password_verify($_POST['psw'], $userCred['Pass'])) {
                    session_start();
                    $_SESSION['CustID'] =  $userCred['CustomerID'];
                    header("Location:http://database-comp3512-a2-dec8.herokuapp.com/index.php");
                } else {
                    header("Location:http://database-comp3512-a2-dec8.herokuapp.com/login.php?error=invalidpass");
                }
            }
        }
    } else {
        header("Location:http://database-comp3512-a2-dec8.herokuapp.com/login.php?error=nowork");
        exit();
    }
} catch (Exception $e) {
    die($e->getMessage());
}