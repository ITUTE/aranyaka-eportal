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
        <title>Student Home</title>
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
                                $query = "SELECT stu_name from student_login WHERE stu_id = " . $_SESSION['id'];
                                $result = mysqli_query($conn, $query);
                                list($name) = mysqli_fetch_array($result);
                                echo "Hi, " .  "<strong><font size = 3>" . $name . "</font></strong>";
                        ?>
                        
                    <span class="caret"></span>&nbsp;</a>
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
            <h2 class="margin slide"><strong>Student Home</strong></h2><br>
        </div>


		<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			  <li><a data-toggle="tab" href="#dload">Download Documents</a></li>
			  <li><a data-toggle="tab" href="#groups">My Groups</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			    <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Profile Home</strong></h3><hr><br>
							<div class="row slide">

                    			<p><font size=3px>Here you can view all the information about you.</font></p>
								<?php
								    $query = "SELECT stu_name, stu_usn, stu_dept_code, stu_sem_code FROM student_login WHERE stu_id = " . $_SESSION['id'];
								    $result = mysqli_query($conn, $query);
								    list($name, $pos, $dept, $sem) = mysqli_fetch_array($result);
								    echo "<font size = 6><strong> Name:</strong>" . " " . $name . "</font><br>";
								    echo "<font size = 6><strong> USN:</strong>" . " " . $pos . "</font><br>";
								    echo "<font size = 6><strong> Department:</strong>" . " " . $dept . "</font><br>";
                                    echo "<font size = 6><strong> Semester:</strong>" . " " . $sem . "</font><br>";
								?>
                    <br>
                  			</div>
            	</div>
			</div>
			<div id="dload" class="tab-pane fade">
			    	 <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Download documents</strong></h3><hr><br>
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
								<p>To see information about syllabus <a href="infotable.php" target="_blank" class="btn btn-md btn-info">Click Here</a></p>
										<br>
			            	</div>
		       		 </div>
			</div>
			<div id="groups" class="tab-pane fade">
			    <div class="container-fluid bg-3">
						<h3 class="margin slide text-center"><strong>My Groups</strong></h3><hr>
							<div class="row slide">

                                <p class='text-center'><font size=3px>Here you can view all the groups you are associated with.</font></p>
                                <br>
                                <?php 
                                    $query1 = "SELECT ss_code FROM semester_section WHERE ss_dept_code = '" . $_SESSION['stu_dept'] . "' AND ss_sem_code = '" . $_SESSION['stu_sem'] . "' AND sem_section = '" . $_SESSION['stu_section'] . "'";
                                    $result1 = mysqli_query($conn, $query1);
                                    $ss_code = mysqli_fetch_row($result);    
                                    
                                    $query2 = "SELECT grp_name FROM groups WHERE grp_code = '" . $ss_code[0] . "'";
                                    $result2 = mysqli_query($conn, $query2);
                                    echo "<div class=\"container-mid\">";
                                        echo "<p class=\"slide text-center\"><strong>Class Group</strong></p>";
                                        echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                                                 <tr>
                                                    <th>Group Names</th>
                                                    <th> </th> 
                                                 </tr>";
                                        while(list($group_names) = mysqli_fetch_array($result2))
                                        {
                                            echo "<tr>";
                                            echo "<td>"; echo $group_names; echo "</td>";
                                            echo "<td><a href=\"student-group.php\">enter group </a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</table><hr>";

                                        echo "<p class=\"slide text-center\"><strong>Other Groups</strong></p>";
                                        $query = "SELECT g.grp_name FROM groups g, student_groups sg WHERE sg.sg_usn = '" . $_SESSION['student'] . "' AND sg.sg_grp_code = g.grp_code";
                                        $result = mysqli_query($conn, $query);
                                        echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                                                 <tr>
                                                    <th>Group Names</th>
                                                    <th> </th> 
                                                 </tr>";
                                        while(list($group_names) = mysqli_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>"; echo $group_names; echo "</td>";
                                            echo "<td><a href=\"student-group.php\">enter group </a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</table><hr>";
                                    echo "</div>";
                                ?>
                  			</div>
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
	if(@$_SESSION['student'] == "")
	{
		header("Location: mysLogind.php");
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
