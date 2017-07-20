<?php 
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Faculty Home</title> 
        <link href='css/bootstrap.css' rel='stylesheet'> 
        <link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="eportal.css">
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
              padding-bottom: 10px;
          }
            .xxx{
                color: darkcyan;
            }
          .bg-4 { 
              padding-top: 0px;
              padding-bottom: 2px;
              background-color: darkcyan; 
              color: #fff;
          }
          .dropsize{
                width: 40%;
                margin-left: 30%;
                margin-right: 30%;
            }
		  .logout{
				margin-right: 3%;
		  }
          .padright{
                 margin-right: 10px;
                 padding-bottom: 3px;
                 
          }    
		</style>
		<script>
		history.pushState(null, null, document.URL);
		window.addEventListener('popstate', function () {
			history.pushState(null, null, document.URL);
		});
		</script>
		
		<script>
		function sub_list(str) 	
		{
			if (str == "") 
			{
				document.getElementById("sublist").innerHTML = "";
				return;
			} 
			else 
			{ 
				//alert(str);
				if (window.XMLHttpRequest) 
				{
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} 
				else 
				{
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("sublist").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","FList.php?q="+str,true);
				xmlhttp.send();
			}
		}
		</script>		
    </head> 
    <body>
    
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                            <ul class="nav navbar-nav">
                                <li><a href="myfLogind.php" title="Go Back"><img src="back.png" style="width:50px;height:50px;"></a></li>
                                <li><strong><font size=5px>E-Portal</font></strong></li>
                                <li><a class="btn btn-success" href="index.php">HOME</a></li>
                            </ul>
							<ul class="nav nav-tabs navbar-right logout">
                                <li><form method="POST"><input class="btn navbar-btn btn-danger" type="submit" value="Logout " name="Logout"/></form></li>
							</ul>
						
						
                    </div>
                </div>
            </div>
        </div>
    
	   
            <div class="container-fluid bg-1 text-center">
                <br><br><br><br><br><br>
                <i class='glyphicon glyphicon-education slide'></i> 
                    <h2 class="margin slide"><strong>Faculty Home</strong></h2>
                    <br>
            </div>
        <div id="upload">
            <div class="container-fluid bg-3 text-center slide">    
              <h3 class="margin"><strong>Upload documents</strong></h3><hr><br>
              <div class="row slide">
                     <form method="POST">
                    <p class="slide">Select Semester:</p>
                        <select class="form-control col-md-6 slide dropsize" name="semester" onclick="sub_list(this.value)" onkeyup="sub_list(this.value)" onkeydown="sub_list(this.value)" onchange="sub_list(this.value)">
                            <option value="">Select...</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                            <option value="5">Fifth</option>
                            <option value="6">Sixth</option>
                            <option value="7">Seventh</option>
                        </select><br>
                  </form><br><hr>
                  <p>To see information about syllabus <a href="infotable.php" class="btn btn-md btn-info">Click Here</a></p>
                  <div id="sublist"></div>	<hr>
              </div> 
            </div>
        </div>
        
        <div id="dload">
             <div class="container-fluid bg-3 text-center slide">    
              <h3 class="margin"><strong>Delete Documents</strong></h3><hr><br>
              <div class="row slide">
                <a href="delete.php"><button class="btn-lg btn-danger slide" id="click" name="click" value="Delete">Delete Contents</button></a><hr>
              </div> 
            </div>
        </div>
    
                <div class="container-fluid bg-3 text-center slide">    
                      <h3 class="margin"><strong>Upload Extra Circular</strong></h3><hr><br>
                      <div class="row slide">
                        <div class=col-xs-6>
                            <h2 class="xxx">Upload Circulars</h2>
                            <a href="delete.php"><button class="btn-lg btn-info slide" id="click" name="click" value="Delete">Upload Circular</button></a><hr>
                        </div>
                        <div class=col-xs-6>
                            <h2 class="xxx">Upload Events</h2>
                            <a href="delete.php"><button class="btn-lg btn-info slide" id="click" name="click" value="Delete">Upload Event</button></a><hr>
                        </div>


                      </div> 
                </div>
       
    <footer class="container-fluid bg-4 text-center">
      <p><font size = "2">Developed by undergraduate students of CSE department.</font></p> 
    </footer>
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

        <script>
            $(window).load(function() {
                $(".se-pre-con").fadeOut(1500);;
            });
        </script>
        
    </body>
</html>

<?php
	require_once 'dbconnect.php';
	if(@$_SESSION['faculty'] == "") 
	{ 
		header("Location: myfLogind.php");
		exit;
	} 
	if(isset($_POST['Logout']))
	{
		session_destroy();
		header("Location: myfLogind.php");
		exit;
	}
	//$res=mysqli_query($conn, "SELECT id, username FROM flogin WHERE username=".$_SESSION['faculty']); 
	ob_end_flush(); 
?>