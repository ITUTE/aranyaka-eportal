<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Home</title> 
        <link href='css/bootstrap.css' rel='stylesheet'> 
        <link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="eportal.css">
		<style>
		html{
			overflow:scroll
		}
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
          color: #ffffff;
          background-size: cover;
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
      .dropsize{
                width: 40%;
                margin-left: 30%;
                margin-right: 30%;
            }
		</style>
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
				xmlhttp.open("GET","SList.php?q="+str,true);
				xmlhttp.send();
			}
		}
		</script>		
</head> 
<body>
    <div class="se-pre-con"></div>
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                        <h1><i class='glyphicon glyphicon-book'></i>E-Portal</h1>
                    </div>
                </div>
            </div>
        </div>
	
        <div class="container-fluid bg-1 text-center">
            <br><br><br><br><br><br>
            <i class='glyphicon glyphicon-education slide'></i> 
                <h2 class="margin slide"><strong>Student Home</strong></h2>
                <br> 
        </div>
    

        <div class="container-fluid bg-3 text-center slide">    
          <h3 class="margin"><strong>Download resources based on your semester</strong></h3><hr><br>
          <div class="row slide">
              <form method="POST">
				<p class="slide">Select Semester:</p>
					<select class="form-control col-md-6 slide dropsize" name="semester" onclick="sub_list(this.value)" onkeyup="sub_list(this.value)" onkeydown="sub_list(this.value)">
                        <option value="">Select...</option>
						<option value="3">Third</option>
						<option value="4">Fourth</option>
                        <option value="5">Fifth</option>
						<option value="6">Sixth</option>
						<option value="7">Seventh</option>
					</select>
              </form><br><hr>
              <p>To see information about syllabus <a href="infotable.php" class="btn btn-md btn-info">Click Here</a></p>
              <div id="sublist"></div>	<hr><br>
					<form method="POST"><input class="slide btn btn-danger" type="submit" value="Logout" name="Logout"></form>  
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

<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if(@$_SESSION['student'] == "") 
 { 
	 header("Location: mysLogind.php");
	 exit;
 } 
 
 if(isset($_POST['Logout']))
 {
	 session_destroy();
	 header("Location: mysLogind.php");
	 exit;
 }
 
 //$res=mysqli_query($conn, "SELECT id, username FROM flogin WHERE username=".$_SESSION['faculty']);
 
 ob_end_flush(); 
?> 