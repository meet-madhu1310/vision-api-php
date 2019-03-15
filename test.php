<?php
session_start();

require "vendor/autoload.php";


use Google\Cloud\Vision\VisionClient;
$vision = new VisionClient(['keyFile' => json_decode(file_get_contents("key.json"), true)]);

$familyPhotoResource = fopen($_FILES['image']['tmp_name'], 'r');

$image = $vision->image($familyPhotoResource,
[
  'WEB_DETECTION'
]);
$result = $vision->annotate($image);

if ($result) {
  $imagetoken = random_int(1111111, 999999999);
} else {
  header("location: index.php");
  die();
}


$properties = $result->imageProperties();
$web = $result->web();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Google Cloud Vision API</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <style media="screen">
  body,html{
    height: 100vh;
  }
  .main-box{
    margin:auto; background:white; padding:20px; box-shadow:10px 10px #888
  }
  .my-btn{
    border-radius:0px;
  }
  p{
    font-style: italic;
  }
  .center{
    text-align: center;
  }

  .container-fluid  {
    margin-bottom: 50px;
  }
</style>
</head>
<body class="background">
  <div class="container-fluid" style="max-width: 90%;">

    <div class="row">
      <div class="col-md-12" style="margin: auto; background: white; padding: 20px;">
        <div class="panel-heading center">
          <h2 class="center" style="margin-bottom: 50px;">Data from Vision API</h2>

          <?php include "web.php" ;?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
