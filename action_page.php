<?php
require_once 'includes/index.inc.php';
session_start();
if (isset($_SESSION['favorites'])) {
    foreach ($_SESSION['favorites'] as $fave) {
        echo "<h1> " .  $fave['PaintingID'] . "</h1>";
        echo "<h1> " .  $fave['Title'] . "</h1>";
        echo "<h1> " .  $fave['ImageFileName'] . "</h1>";
        echo "<h1> " .  $fave['ArtistID'] . "</h1>";
        echo "<h1> " .  $fave['GalleryID'] . "</h1>";
    }
} else {
    echo "no fav yet";
}

?>

<html>

<body>
    <form action="action_page1.php" method="post">
        <div id="formBtn">
            <button type="submit">Login</button>
            <button type="submit">Join</button>
        </div>
        <input type="text" placeholder="SEARCH BOX FOR Paintings" name="pSearch">
    </form>
</body>

</html>