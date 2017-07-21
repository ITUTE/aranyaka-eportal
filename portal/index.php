<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>E-portal home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="eportal.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<style>
  body {
      font-family: American Typewriter;
      line-height: 1.8;
      color: #f5f6f7;    
  }
  p {
	  font-size: 23px; 
  }
  .margin {
	  margin-bottom: 30px;
      font-size: 50px;
  }
  .margin1 { 
		margin-bottom: 13px;
  }
  .bg-1 { 
      background-image: url(home.jpg);
      background-size: cover; 
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
  
	<script>
		history.pushState(null, null, document.URL);
		window.addEventListener('popstate', function () {
			history.pushState(null, null, document.URL);
		});
	</script>
</head>

<body>   
<div class="se-pre-con"></div>
<div class="container-fluid bg-1 text-center ">
  <h2 class="margin slide"><strong>E-PORTAL</strong></h2>
  <img src="rv.JPG" class="img-responsive img-circle margin1 slide" style="display:inline" alt="Bird" width="150" height="150">
  <h3 class="slide"><strong>R.V. College of Engineering, Bangalore</strong></h3> 
</div>

<div class="container-fluid bg-3 text-center slide">    
  <h3 class="margin"><strong>Enter the E-Portal</strong></h3><hr><br>
  <div class="row slide">
    <div class="col-sm-6">
      <p>A faculty member can only <strong>upload</strong>, <strong>view</strong> and <strong>delete</strong> the course materials.</p>
      <a href="myfLogind.php" class="btn btn-lg btn-success" role="button">Faculty Login</a>
    </div>
    <div class="col-sm-6"> 
      <p>A student can only <strong>view</strong> and <strong>download</strong> the desired course materials.</p>
      <a href="mysLogind.php" class="btn btn-lg btn-primary" role="button">Student Login</a>
    </div>
  </div> 
</div>

                    <div class="container-fluid bg-3 text-center slide">    
                      <h3 class="margin"><strong>Events and Circulars</strong></h3><hr><br>
                      <div class="row slide">
                        <a href="CEvent.php"><button class="btn-lg btn-success slide" id="click" name="click" value="View">View</button></a><hr>
                      </div> 
                    </div>


<footer class="container-fluid bg-4 text-center">
  <p><font size = "2">Developed by undergraduate students of CSE department.</font></p> 
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<script>
	$(window).load(function() {
		$(".se-pre-con").fadeOut(1500);;
	});
</script>

</body>
</html>
