<?php
require_once 'dbconfig.inc.php';
require_once 'db-class.inc.php';
try {
    $conn = DatabaseConn::establishConn(array(DBCONNECTION, DBUSER, DBPASS));
    $dbConnect = new loginDB($conn);
    if (isset($_POST['submit'])) {
        if (empty($_POST['uname']) || empty($_POST['psw'])) {
            header('Location: https://comp3512-296719.wl.r.appspot.com/login.php?error=empty',  true,  301);
            die('should have redirected by now');
            exit();
        } else {
            $userCred = $dbConnect->checkUser($_POST['uname']);
            if (!empty($userCred)) {
                if (password_verify($_POST['psw'], $userCred['Pass'])) {
                    session_start();
                    $_SESSION['CustID'] =  $userCred['CustomerID'];
                    header('Location: https://comp3512-296719.wl.r.appspot.com/index.php',  true,  301);
                    die('should have redirected by now1');
                    exit();
                } else {
                    header('Location: https://comp3512-296719.wl.r.appspot.com/login.php?error=invalidpass',  true,  301);
                    die('should have redirected by now2');
                    exit();
                }
            }else {
                header('Location: https://comp3512-296719.wl.r.appspot.com/login.php?error=nowork',  true,  301);
                die('should have redirected by now3');
                exit();
            }
        }
    } else {
        header('Location: https://comp3512-296719.wl.r.appspot.com/login.php?error=nowork',  true,  301);
        die('should have redirected by now3');
        exit();
    }
} catch (Exception $e) {
    die($e->getMessage());
}