<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="Lorenzo Young">
    <title>COMP 3512 Assign2</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <script src="js/jscript.js"></script>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Assignment2</label>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="galleries.php">Galleries</a></li>
            <li><a href="browse-paintings.php">Browse/Search Paintings</a></li>
            <li><a href="favorites.php">Favorites</a></li>
            <?php
            if (isset($_SESSION['CustID'])) {
                echo "<li><a href='logout.php'>LogOut</a></li>";
            } else {
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
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
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "empty") {
                        echo "<h2 class='errormsg'>Incomplete Field entry</h2>";
                    } else if ($_GET['error'] == "invalidemail") {
                        echo "<h2 class='errormsg'>Email not Found!</h2>";
                    } else if ($_GET['error'] == "invalidpass") {
                        echo "<h2 class='errormsg''>Password is incorrect!</h2>";
                    } else if ($_GET['error'] == "noexist") {
                        echo "<h2 class='errormsg''>Account not Found!</h2>";
                    } else if ($_GET['error'] == "nowork") {
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