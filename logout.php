<?php 
session_start();
//echo $_SESSION['CustID'];
session_destroy();

header("Location:index.php");

?>
