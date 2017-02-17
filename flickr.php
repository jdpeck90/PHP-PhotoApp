<?php

$api_key = '99fc41830eebadbf96cee2f6b52a2ba2';

$tag = 'jeans';
$perPage = 25;
$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
$url.= '&api_key='.$api_key;
$url.= '&tags='.$tag;
$url.= '&per_page='.$perPage;
$url.= '&format=json';
$url.= '&nojsoncallback=1';

$response = json_decode(file_get_contents($url));
$photo_array = $response->photos->photo;

// print ("<pre>");
// print_r($response);
// print ("</pre>");
$pic_array = array();
foreach($photo_array as $single_photo){

$farm_id = $single_photo->farm;
$server_id = $single_photo->server;
$photo_id = $single_photo->id;
$secret_id = $single_photo->secret;
$size = 'm';

$title = $single_photo->title;

$photo_url = 'http://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';

$image = "<img title=".$title." src=".$photo_url." height='300px' />";
array_push($pic_array, $image);
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>2 One 5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .form {
    width: 19%;
    margin: 0 auto;
  }
  .item {
    height: 500px;
   }
   .carousel-indicators {
    display: none;
   }
   .carousel-inner > .item {
    -webkit-transition: 0.1s left;
    -moz-transition: 0.1s left;
    -o-transition: 0.1s left;
    transition: 0.1s left;
}
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 30%;
      margin: auto;
  }
   .item img {
    height: 500px;
  }
  </style>
</head>
<body>
<div class="container">
<form action = "<?php $_PHP_SELF ?>" method = "GET">
     <input type="text" name="query" id="subject" placeholder="Search Photos Here" />
     <input type = "submit" />
</form>
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="100">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <?php print $pic_array[7] ?>
      </div>

      <div class="item">
        <?php print $pic_array[8] ?>
      </div>

      <div class="item">
        <?php print $pic_array[9] ?>
      </div>

      <div class="item">
        <?php print $pic_array[10] ?>
      </div>
      <div class="item">
        <?php print $pic_array[11] ?>
      </div>

      <div class="item">
        <?php print $pic_array[12] ?>
      </div>

      <div class="item">
        <?php print $pic_array[6] ?>
      </div>
    </div>

    <!-- Left control -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <!-- Right control -->
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<?php
   if( $_GET["query"] ) {
    $tag = $_GET["query"];
    $perPage = 25;
    $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
    $url.= '&api_key='.$api_key;
    $url.= '&tags='.$tag;
    $url.= '&per_page='.$perPage;
    $url.= '&format=json';
    $url.= '&nojsoncallback=1';
  $response = json_decode(file_get_contents($url));
  $photo_array = $response->photos->photo;
      echo print_r($response);
   exit();
   }
?>
</body>
</html>

