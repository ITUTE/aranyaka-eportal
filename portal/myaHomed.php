<?php
	ob_start();
	session_start();
	include 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator Home</title>
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
				  background-image: url(pics/home1.jpg);
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

    </head>

<body>
    <div class="se-pre-con"></div>
    <nav class="navbar navbar-inverse navbar-fixed-top">

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
                            $query = "SELECT admin_name from admin WHERE admin_id = " . $_SESSION['id'];
                            $result = mysqli_query($conn, $query);
                            list($name) = mysqli_fetch_array($result);
                            echo "Welcome " .  "<strong><font size = 3>" . $name . "</font></strong>";
                    ?>

                <span class="caret"></span>&nbsp;</a>
                <ul class="dropdown-menu">
                    <li><a href="#home"><font color = "darkcyan">Profile</font></a></li>
                    <li><a class = ""><form method="POST"><input type="submit" value="Logout "style="color:white; background-color:darkcyan;border:2px solid black" name="Logout"/></form></a></li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid bg-1 text-center"><br><br><br>
        <i class='glyphicon glyphicon-education slide'></i>
        <h2 class="margin slide"><strong>Administrator Home</strong></h2><br>
    </div>


    <ul class="nav nav-tabs nav-justified">
          <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
          <li><a data-toggle="tab" href="#add">Add Student/Faculty</a></li>
          <li><a data-toggle="tab" href="#modify">Modify Student/Faculty</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="container-fluid bg-3">
                    <h3 class="margin slide text-center"><strong>Profile Home</strong></h3><hr><br>
                        <div class="row slide">

                            <p class='text-center'><font size=3px>Here you can view all the information about you.</font></p><br>
                            <?php
                                $query = "SELECT admin_name, admin_dept FROM admin WHERE admin_id = " . $_SESSION['id'];
                                $result = mysqli_query($conn, $query);
                                list($name, $dept) = mysqli_fetch_array($result);
                                echo "<div class=\"container-mid\">
                                        <table class=\"table slide\" style=\"width:100%\">
                                             <tr>

                                             </tr>";
                                echo "<tr class=\"success\">
                                        <td><font size = 6><strong> Name:</strong></font></td><td class=\"text-center\"><font size = 6>" . " " . $name . "</font></td></tr>";

                                echo "<tr class=\"info\">
                                        <td><font size = 6><strong> Department:</strong></font></td><td class=\"text-center\"><font size = 6>" . " " . $dept . "</font></td></tr>";
                                echo "  </table>
                                    </div>";
                            ?>
                <br>
                        </div>
            </div>
        </div>
        
        <div id="add" class="tab-pane fade">
                 <div class="container-fluid bg-3 text-center">
                    <h3 class="margin slide"><strong>Add Student/Faculty</strong></h3><hr><br>

                 
            
                <a href="addNewStudent.php" class="btn btn-info" role="button">Add new Student</a>
                <br>
                <br>
                <br>
                <a href="addNewFaculty.php" class="btn btn-info" role="button">Add new Faculty</a>
                </div>
        </div>
        
        <div id="modify" class="tab-pane fade">
                 <div class="container-fluid bg-3 text-center">
                    <h3 class="margin slide"><strong>Modify Student/Faculty</strong></h3><hr><br>
                     <a href="modifyStudent.php" class="btn btn-info" role="button">Modify Student</a>
                     <br>
                     <br>
                     <br>
                     <a href="modifyFaculty.php" class="btn btn-info" role="button">Modify Faculty</a>
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
	if(@$_SESSION['admin'] == "")
	{
		header("Location: index.php");
		exit;
	}
	if(isset($_POST['Logout']))
	{
		session_destroy();
		header("Location: index.php");
		exit;
	}
	ob_end_flush();
?>
