<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>E-portal home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="eportalhome.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font-family: American Typewriter;
      line-height: 1.8;
      color: #f5f6f7;
      
  }
  p {font-size: 23px;}
  .margin {margin-bottom: 30px;
      font-size: 50px}
  .margin1 { margin-bottom: 13px}
  .bg-1 { 
      background-image: url(home.jpg);
      background-size: 100%; 
      color: #ffffff;
      
      
  }
  .bg-2 { 
      background-color: #474e5d; 
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; 
      color: darkcyan;
  }
  .bg-4 { 
      padding-top: 0px;
      padding-bottom: 2px;
      background-color: darkcyan; 
      color: #fff;
  }
 
  
  
  </style>
</head>
<body>




<div class="container-fluid bg-1 text-center">
  <h2 class="margin"><strong>E-PORTAL</strong></h2>
  <img src="rv.JPG" class="img-responsive img-circle margin1" style="display:inline" alt="Bird" width="150" height="150">
  <h3><strong>R.V. College of Engineering, Bangalore</strong></h3>
  
</div>


<div class="container-fluid bg-3 text-center">    
  <h3 class="margin"><strong>Enter the E-Portal</strong></h3><hr><br>
  <div class="row">
    <div class="col-sm-6">
      <p>A faculty member can only <strong>upload</strong>, <strong>view</strong> and <strong>delete</strong> the course materials.</p>
      <a href="fLogin1.php" class="btn btn-lg btn-success" role="button">Faculty Login</a>
    </div>
    <div class="col-sm-6"> 
      <p>A student can only <strong>view</strong> and <strong>download</strong> the desired course materials.</p>
      <a href="slogin.php" class="btn btn-lg btn-primary" role="button">Student Login</a>
    </div>
  </div>
</div>


<footer class="container-fluid bg-4 text-center">
  <p><font size = "2">Developed by undergraduate students of CSE department.</font></p> 
</footer>

</body>
</html>
