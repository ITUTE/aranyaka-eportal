<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
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
				  background-image: url(pics/home.jpg);
				  background-size: cover;
				  color: #ffffff;
				  background-attachment: fixed;
				  background-position: center;
				  background-repeat: no-repeat;
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
		<div class="se-pre-con"></div>
		<!--
        <div class="container-fluid">
			<div class="row">
				<div class='col-xs-12'>
					<div class="style">
						<div class='navbar navbar-inverse navbar-fixed-top'>
							<ul class="nav navbar-nav">
								<li><a class="btn navbar-btn" href="myfLogind.php">Go Back</a></li>
								<li class="titlenav"><strong><font size=6px>#E-Portal</font></strong></li>
								<li><a class="navbar-btn btn btn-success" href="index.php">HOME</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right logout">
								<li><form method="POST"><input class="btn navbar-btn btn-danger" type="submit" value="Logout " name="Logout"/></form></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        -->
        <nav class="navbar navbar-inverse">
          
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-left" href="http://www.rvce.edu.in/" target = "_blank"><img src="pics/rv.JPG" class="img-circle" height=50 ondragstart="return false;" alt="logo"/></a>
              <a href="index.php" class="navbar-brand"><strong>#E-PORTAL</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class=""><a href="index.php">Home</a></li> 
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php 
                                $query = "SELECT name from flogin WHERE id = " . $_SESSION['id'];
                                $result = mysqli_query($conn, $query);
                                list($name) = mysqli_fetch_array($result);
                                echo "Hi, "; echo "<strong><font size = 3>"; echo $name; echo "</font></strong>";
                        ?>
                        
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#home"><font color = "darkcyan">Profile</font></a></li>
                        <li><a class = ""><form method="POST"><input type="submit" value="Logout " name="Logout"/></form></a></li>
                    </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="container-fluid bg-1 text-center"><br><br><br>
            <i class='glyphicon glyphicon-education slide'></i>
            <h2 class="margin slide"><strong>Faculty Home</strong></h2><br>
        </div>


		<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			  <li><a data-toggle="tab" href="#upload">Upload Documents</a></li>
			  <li><a data-toggle="tab" href="#groups">My Groups</a></li>
			  <li><a data-toggle="tab" href="#delete">Delete Documents</a></li>
			  <?php
                $query = "SELECT permit FROM flogin WHERE id = " . $_SESSION['id'];
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);
                if($row[0]=="YES")
                {
                    ?>
                         <li><a data-toggle="tab" href="#circular">Events and Circulars</a></li>
                    <?php
                }
        ?>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			    <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Profile Home</strong></h3><hr><br>
							<div class="row slide">

                    			<p><font size=3px>Here you can view all the information about you.</font></p>
													<?php
																	$query = "SELECT name, position, dept FROM flogin WHERE id = " . $_SESSION['id'];
																	$result = mysqli_query($conn, $query);
																	list($name, $pos, $dept) = mysqli_fetch_array($result);
																 	echo "<font size = 6><strong> Name:</strong>"; echo " "; echo $name; echo "</font><br>";
																	echo "<font size = 6><strong> Position:</strong>"; echo " "; echo $pos; echo "</font><br>";
																	echo "<font size = 6><strong> Department:</strong>"; echo " "; echo $dept; echo "</font><br>";
													?>
                    <br>
                  			</div>
            	</div>
			</div>
			<div id="upload" class="tab-pane fade">
			    	 <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Upload documents</strong></h3><hr><br>
			            	<div class="row slide">
								<form method="POST">
									<p class="slide">Select Semester:</p>
			             <select class="form-control col-md-6 slide dropsize" name="semester" onclick="sub_list(this.value)" onkeyup="sub_list(this.value)" onkeydown="sub_list(this.value)" onchange="sub_list(this.value)">
										 <option value="">Select Semester</option>
			                      <option value="1">First Semester</option>
			                      <option value="2">Second Semester</option>
			                      <option value="3">Third Semester</option>
			                      <option value="4">Fourth Semester</option>
			                      <option value="5">Fifth Semester</option>
			                      <option value="6">Sixth Semester</option>
			                      <option value="7">Seventh Semester</option>
			              </select><br>
								</form><br>
								<p><font size=3px>Select a semester and then pick the desired course</font></p><hr>
								<div id="sublist"></div><br>
								<p>To see information about syllabus <a href="infotablef.php" class="btn btn-md btn-info">Click Here</a></p>
										<br>
			            	</div>
		       		 </div>
			</div>
			<div id="groups" class="tab-pane fade">
			    <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>My Groups</strong></h3><hr><br>
							<div class="row slide">

                    			<p><font size=3px>Here you can view all the groups you are associated with.</font></p>
                    <br>
                  			</div>
            	</div>
			</div>
			<div id="delete" class="tab-pane fade">
           		 	<div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Delete Documents</strong></h3><hr><br>
							<div class="row slide">
								<a href="delete.php"><button class="btn-lg btn-danger slide" id="click" name="click" value="Delete">Delete Contents</button></a><br><br>
                    			<p><font size=3px>Here you can view all the materials uploaded by members of faculty,<br> with the additional feature of deleting the ones uploaded by you</font></p>
                    <br>
                  			</div>
            		</div>
        	</div>

			 <div id="circular" class="tab-pane fade">
				    <?php
						$query = "SELECT permit FROM flogin WHERE id = " . $_SESSION['id'];
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_row($result);
						if($row[0]=="YES")
						{
							?>


				           <div class="container-fluid bg-3 text-center">
							<h3 class="margin slide"><strong>Upload Extra Curriculars</strong></h3><hr><br>
								<div class="container-fluid bg-3 text-center slide">

								<div class="row slide">
									<div class=col-xs-6>
										<h2 class="xxx">Upload Circulars</h2>
											<a href="CEventUpload.php?id=1"><button class="btn-lg btn-info slide" name="click" value="Delete">Upload Circular</button></a>
										</div>
				                        <div class=col-xs-6>
											<h2 class="xxx">Upload Events</h2>
											<a href="CEventUpload.php?id=2"><button class="btn-lg btn-info slide" name="click" value="Delete">Upload Event</button></a>
										</div>
								</div><br><br>

								<div class="container-fluid bg-3 text-center slide">
									<div class="row slide">
										<div class=col-xs-6>
											<h2 class="xxx">Delete Circulars</h2>
											<a href="CircularDelete.php"><button class="btn-lg btn-danger slide"  name="click" value="Delete">Delete Circular</button></a>
										</div>
										<div class=col-xs-6>
											<h2 class="xxx">Delete Events</h2>
											<a href="EventDelete.php"><button class="btn-lg btn-danger slide"  name="click" value="Delete">Delete Event</button></a>
										</div>
									</div>
				                </div><br><br>
				            </div>
								<?php
							}
						?>
				  			</div>
				</div>
		</div>

		<footer class="container-fluid bg-4 text-center">
			<p><font size = "2">Developed by undergraduate students of CSE department.</font></p>
			<p><a href="http://www.rvce.edu.in/" target = "_blank"><font size=2px color="white">R.V. College of Engineering</font></a></p>
		</footer>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            $(window).load(function() {
                $(".se-pre-con").fadeOut(1500);;
            });
        </script>
    </body>
</html>

<?php
	if(@$_SESSION['faculty'] == "")
	{
		header("Location: myfLogind.php");
		exit;
	}
	if(isset($_POST['Logout']))
	{
		session_destroy();
		header("Location: index.php");
		exit;
	}
	//$res=mysqli_query($conn, "SELECT id, username FROM flogin WHERE username=".$_SESSION['faculty']);
	ob_end_flush();
?>
