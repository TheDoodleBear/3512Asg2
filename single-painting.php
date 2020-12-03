<?php
require_once 'includes/dbconfig.inc.php';
require_once 'includes/db-class.inc.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $painting = findPainting($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="">
    <title>COMP 3512 Assign1</title>
    <link rel="stylesheet" type="text/css" href="/3512SoloAsg2/css/single-painting.css" media="screen"/>
    <script src="js/sng-paint.js"></script>
</head>

<body>
    <main id="singlePaintPage">
        <div class="headr">
            <h1>Painting Details</h1>
        </div>
        <div class="paintContent">
            <?php
                displayPainting($painting);
            ?>
        </div>
    </main>
</body>

</html>