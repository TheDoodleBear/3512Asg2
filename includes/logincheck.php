<?php
require_once 'dbconfig.inc.php';
require_once 'db-class.inc.php';
try {
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));
    $dbConnect = new loginDB($conn);
    if (isset($_POST['submit'])) {
        if (empty($_POST['uname']) || empty($_POST['psw'])) {
            header('Location: ../login.php?error=empty',  true,  301);
            exit();
        } else {
            $userCred = $dbConnect->checkUser($_POST['uname']);
            if (!empty($userCred)) {
                if (password_verify($_POST['psw'], $userCred['Pass'])) {
                    session_start();
                    $_SESSION['CustID'] =  $userCred['CustomerID'];
                    header('Location: ../index.php',  true,  301);
                    exit();
                } else {
                    header('Location: ../login.php?error=invalidpass',  true,  301);
                    exit();
                }
            }else {
                header('Location: ../login.php?error=nowork',  true,  301);
                exit();
            }
        }
    } else {
        header('Location: ../login.php?error=nowork',  true,  301);
        exit();
    }
} catch (Exception $e) {
    die($e->getMessage());
}
