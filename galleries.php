<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COMP3512 Assignment02">
    <meta name="author" content="">
    <title>COMP 3512 Assign1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/favorites.css" />
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="css/app.css" />
</head>

<body>
<?php

// Inintialize URL to the variable 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";      
// Use parse_url() function to parse the URL  
$url_components = parse_url($url); 

// Use parse_str() function to parse the 
// string passed via URL 

      
// Display result 


if (!isset ($url_components['query']) ) {  
    $page = 1;  
} else {  
    parse_str($url_components['query'], $params); 
    $page = $params['page'];  
} 

$data = array('Page' => $page);
$headers   = array();
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "Accept: application/json";
$headers[] = "X-API-Key: 123456789";

$api_url = 'http://localhost/PHP_1/api/galleries/read.php';

function fetch(string $method, string $url, string $body, array $headers = []) {
   
    $context = stream_context_create([
        "http" => [
            // http://localhost/PHP_1/api/galleries/read.php
            "method"        => $method,
            "header"        => implode("\r\n", $headers),
            "content"       => $body,
            "ignore_errors" => true,
        ],
    ]);

    $response = file_get_contents($url, false, $context);

  

    $status_line = $http_response_header[0];

    preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);

    $status = $match[1];

    if ($status !== "200") {
        throw new RuntimeException("unexpected response status: {$status_line}\n" . $response);
    }
    
    return $response;
}

// The data is stored in the  
// result variable 
$json_data = fetch('POST', $api_url, json_encode($data), $headers);



$response_data = json_decode($json_data);
$ii = 0;
?>
<!-- header -->
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
    <!-- content -->
<div class="container-fluid" style="width: 70%">
  <div class="row pt-5">
    <?php foreach($response_data->result as $row) : 
        $ii ++; ?>
        <div class="col-md-4 pt-4">
            <div class="card">
                <img class="card-img-top" id="Card_image" src="img/artists/full/<?php echo (99+$ii); ?>.jpg" height="300px;">
                <script>
                    var tt = '<?php echo $ii; ?>';
                    var map_id = "Card_image"+ tt;
                    function myMap() {
                       var mapProp= {
                            center:new google.maps.LatLng(<?php echo $row->Latitude; ?>,<?php echo $row->Longitude; ?>),
                            zoom:5,
                        };
                        var map = new google.maps.Map(document.getElementById(map_id),mapProp);
                    }
                </script>
                <div class="card-body">
                <h4 class="card-title"><?php echo $row->GalleryName. "  (" .$row->GalleryNativeName. " )";?></h4>
                <p class="card-text"><?php echo $row->GalleryAddress. ",  " .$row->GalleryCity.",  " .$row->GalleryCountry; ?></p>
                <a href="<?php echo $row->GalleryWebSite?>">See Website</a>
                <a class="float-right" href="http://localhost/PHP_1/single-gallery.php?id=<?php echo $row->GalleryID ?>" style="font-style: italic; color: #cccccc;">More detail...</a>
                </div>
            </div>
        </div>
    <?php 
        if($ii % 3 == 0) 
          echo '</div><div class="row pt-3">';
    endforeach; ?>
  
    <div class="row">
        <ul class="pagination">
            <?php for($page = 1; $page<= $response_data->number_of_page; $page++) : 
                echo '<li class="page-item" active-id='.(($response_data->current_page == $page)? 1: 0).'><a class="page-link" href = "http://localhost/PHP_1/galleries.php?page='.$page.'">' . $page . ' </a></li>';  
             endfor; ?>
        </ul>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/jscript.js"></script>
<script>
    
    $("ul.pagination li").each(function(i) {
        var $this = $("ul.pagination li").eq(i);
        $this.removeClass("active");
        if($(this).attr("active-id") == 1)
          $(this).addClass("active");
    })
    
</script>
</body>

</html>