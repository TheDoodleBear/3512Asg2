<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="">
    <title>COMP 3512 Assign1</title>    
    <style>
        <?php include "./css/style.css" ?>
    </style>
    <script src="js/jscript.js"></script>
</head>

<body>
<main id="loginPage">
    <div class="loginWrapper">
        <h1>User Log In</h1>

        <form class="loginForm" action="includes/logincheck.php" method="POST">
            <div class="container">
                <div class="textbx">
                    <label>Enter Email</label>
                    <input type="text" name="uname">
                </div>
                <div class="textbx"><label>Enter Password</label>
                    <input type="password" name="psw">
                </div>
                <div class="frmBtn">
                    <button type="submit" name="submit">Login</button>
                    <button type="button" class="cancelbtn" formaction="index.php">Sign Up</button>
                </div>
            </div>
            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "empty"){
                    echo "<h2 class='errormsg'>Incomplete Field entry</h2>";
                }else if($_GET['error'] == "invalidemail"){
                    echo "<h2 class='errormsg'>Email not Found!</h2>";
                }else if($_GET['error'] == "invalidpass"){
                    echo "<h2 class='errormsg''>Password is incorrect!</h2>";
                }else if($_GET['error'] == "noexist"){
                    echo "<h2 class='errormsg''>Account not Found!</h2>";
                }else if($_GET['error'] == "nowork"){
                    echo "<h2 class='errormsg''>failed!</h2>";
                }
            }
            ?>
        </form>
        <span id="imgCred">Photos by <a href="https://unsplash.com/@deuxdoom?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Eric Park</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
    </div>
</main>
</body>

</html>