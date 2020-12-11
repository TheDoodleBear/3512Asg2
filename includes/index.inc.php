<?php
require_once 'includes/dbconfig.inc.php';
require_once 'includes/db-class.inc.php';

function displayHome($userInfo)
{
    echo "<main class='homeMain'>";
    echo "<div class='homeWrapper'>";
    echo "<header class='headr'>";
    echo "<h1>Home Page</h1>";
    echo "</header>";
    echo " <div class='userInfo'>";
    echo "<h1>User Information</h1>";
    displayUserInfo($userInfo);
    echo "</div>";
    echo "<div class='searchBox'><input type='text' class='search_logined' placeholder='SEARCH BOX FOR Paintings' name='pSearch'></div>";
    echo "<div class='favPaint'>";
    echo "<h1>Favorite Paintings</h1>";
    echo "<div class='paintItems'>";
    if (!isset($_SESSION['favorites'])) {
        echo "<h1>You don't have favorites set.</h2>";
    } else {
        foreach ($_SESSION['favorites'] as $fave) {
            displayThumbPaint($fave, "hidden");
        }
    }
    echo "</div>";
    echo "</div>";
    echo "<div class='likePaint'>";
    echo "<h1>Paintings You May Like</h1>";
    echo "<div class='paintItems'>";
    if (!isset($_SESSION['favorites'])) {
        $top15Paint = getTop15();
        foreach ($top15Paint as $key) {
            displayThumbPaint($key, "hidden");
        }
    } else {
        generateRecomList($_SESSION['favorites']);
    }
    echo "</div>";
    echo "</div>";
    echo "</main>";
}

function displayLogIn()
{
    echo "<main id='indexPage'>";
    echo "<div class='heroWrapper1'>";
    echo "<form class='indexForm' action='login.php' method='post'>";
    echo "<div class='frmBtn'>";
    echo "<button type='submit' data-aos='fade-right' id='btn1'>Login</button>";
    echo "<button type='submit' data-aos='fade-left' id='btn2' formaction='signup.php'>Join</button>";
    echo "</div>";
    echo "<input type='text' data-aos='fade-up' data-aos-delay='200' placeholder='SEARCH BOX FOR Paintings' name='pSearch'>";
    echo "</form>";
    echo "<p id='imgCred'>Photos by <a href='https://unsplash.com/@deuxdoom?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText'>Eric Park</a> on <a href='https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText'>Unsplash</a></p>";
    echo "</div>";
    echo "</main>";
}

function displayUserInfo($userInfo)
{
    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));
    $dbConnect = new loginDB($conn);
    $userCred = $dbConnect->findCustomer($userInfo);
    echo "<label>Name</label><span class='username'>: " . $userCred['FirstName'] . " " . $userCred['LastName'] . "</span>";
    echo "<label>City</label><span class='usercity'>: " . $userCred['City'] . "</span>";
    echo "<label>Country</label><span class='usercountry'>: " . $userCred['Country'] . "</span>";
}

function generateRecomList($session)
{
    if (count($session) < 1) {
        $artID = $session[0]['ArtistID'];
        $galID = $session[0]['GalleryID'];
    } else {
        // *converts  $_SESSION['favorites'] to a one dimentional array
        $artistArray = array_column($session, 'ArtistID');
        $galleryArray = array_column($session, 'GalleryID');
        $artID = array_rand($artistArray);
        $galID = array_rand($galleryArray);
    }

    $conn = DatabaseConn::establishConn(array(DBCONNSTRING, DBUSER, DBPASS));
    $dbConnect = new PaintingDB($conn);

    $rPainting1 =  $dbConnect->getTopPGal10($galID);
    $rPainting2 =  $dbConnect->getTopPArt10($artID);
    $topRecomPaint = array_merge($rPainting1, $rPainting2);
    if (count($topRecomPaint) > 15) {
        $recomPaint = array_slice($topRecomPaint, 0, 15);
        foreach ($recomPaint as $key) {
            displayThumbPaint($key, "hidden");
        }
    } else {
        foreach ($topRecomPaint as $key) {
            displayThumbPaint($key, "hidden");
        }
    }
}
