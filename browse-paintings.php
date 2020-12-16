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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/jscript.js"></script>
</head>

<body>
    <main class="browseMain">
        <div class="browseWrapper">
            <header class="headr">
            </header>
            <div class="paintingFilters">
                <h1>Painting Filters</h1>
                <section class="four wide column">
                    <form class="ui form" method="get" action="<?= 'browse-paintings.php' ?>">
                        <h3 class="ui dividing header">Filters</h3>
                        <div class="field">
                            <label>Title</lable>
                                <input type="text" id="titleSearch" name="titleSearch">
                        </div>
                        <div class="field">
                            <label>Artist</label>
                            <select class="ui fluid dropdown" name="artist">
                                <option value='0'>Select Artist</option>
                                <?php
                                // output all the retrieved galleries 
                                // (hint: set value attribute of <option> to the GalleryID field)
                                foreach ($galleries as $row) {
                                    echo '<option value=' . $row['GalleryID'] . '>' . $row['GalleryName'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="field">
                            <label>Gallery</label>
                            <select class="ui fluid dropdown" name="artist">
                                <option value='0'>Select Gallery</option>
                                <?php
                                // output all the retrieved galleries 
                                // (hint: set value attribute of <option> to the GalleryID field)
                                foreach ($galleries as $row) {
                                    echo '<option value=' . $row['GalleryID'] . '>' . $row['GalleryName'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="field">
                            <label>Before</lable>
                                <input type="text" id="titleSearch" name="titleSearch">
                        </div>
                        <div class="field">
                            <label>After</lable>
                                <input type="text" id="titleSearch" name="titleSearch">
                        </div>
                        <div class="field">
                            <label>Between</lable>
                                <input type="text" id="titleSearch" name="titleSearch">
                        </div>
                        <div class="field">

                            <input type="text" id="titleSearch" name="titleSearch">
                        </div>
                        <button class="small ui orange button" type="submit">
                            <i class="filter icon"></i> Filter
                        </button>
                        <button class="small ui orange button" type="submit">
                            <i class="filter icon"></i> Clear
                        </button>
                    </form>
                </section>


                <section class="twelve wide column">
                    <h1 class="ui header">Paintings</h1>
                    <ul class="ui divided items" id="paintingsList">
                        <?=
                            outputPaintings($paintings);
                        ?>
                    </ul>
                </section>
            </div>
        </div>
        <div class="likePaint">
            <h1>Paintings You May Like</h1>
            <div class="paintItems">
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
            </div>
        </div>
    </main>
</body>

</html>