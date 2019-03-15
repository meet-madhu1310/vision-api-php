<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Google vision API</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<style media="screen">
body,html{
  height: 100%;
}
.main-box{
  margin:auto;
  background:white;
  padding:20px;
}
.my-btn{
  border-radius:0px;
  max-width: 50%;
  background-color: #eee;
  margin: auto;
  border-radius: 25px;
}
p{
  font-style: italic;
}

h3, h2{
  color:#000;
  text-align: center;
}


</style>
<body class=background>
  <div class="container">
    <div class="row">
      <div class="col-md-7 offset-md-3 main-box">
        <div class="panel-heading center">
          <h2 class="center">Example of Vision API</h2>
        </div>
        <h3 class="center">Upload An Image</h3>

        <form action="test.php" method="post" enctype="multipart/form-data">
          <input style="max-width: 50%; margin: auto; margin-top: 50px;" type="file" name="image" accept="image/*" class="form-control">
          <br>
          <button type="submit" name="button"class="btn btn-sm btn-block my-btn">Click here</button>

        </form>
      </div>

    </div>

  </div>
</body>
</html>
