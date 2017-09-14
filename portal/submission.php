<?php
	session_start();
	ob_start();
	include 'dbconnect.php';
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Assignment Submissions</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/bootstrap.css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="eportal.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

	<style>
		.logout{
			margin-right:3%;
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
            <ul style="margin-right:2%;" class="nav navbar-nav navbar-right">
                <li><a class = ""><form method="POST"><input type="submit" value="Logout " style="color:white; background-color:darkcyan;border:2px solid darkcyan;" name="Logout"/></form></a></li>
            </ul>
        </div>
      </div>
    </nav>

    <script>
        $(window).load(function() {
            $(".se-pre-con").fadeOut(1500);;
        });
    </script>
	<br><br>
	<div class="row">
		<div class="container-fluid slide">
			<?php
				if(@$_GET['gf_id']!="") 
				{
					$assignment_id = $_GET['gf_id'];
					$_SESSION['assignment_id'] = $assignment_id;
				}
				$assignment_id = $_SESSION['assignment_id'];
				$query = "SELECT as_id, as_file_name, as_date_upload, as_stu_id FROM assignments WHERE as_num = '$assignment_id'";
				$result = mysqli_query($conn, $query) or die('Error, query failed');
				if(mysqli_num_rows($result)==0) 
				{
					echo "<br><br><br><p style=\"text-align:center\"><font color=\"darkcyan\" size=5px face = \"Comic sans MS\">Sorry ma'am/sir, no students have uploaded anything yet for this assignment!<br>Perhaps you could post an announcement regarding the same.</font></p>";
					die();
				}
				echo "<form>";
				echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
					 <tr>
						<th>Date of Upload</th>
                        <th>USN</th>
                        <th>Name</th>
                        <th>File Name</th>
                        <th></th>
					 </tr>"; 
				while(list($id, $file_name, $date, $student_id) = mysqli_fetch_array($result))
				{
					$query1 = "SELECT stu_usn, stu_name FROM student_login WHERE stu_id='" . $student_id . "'";
                    $result1 = mysqli_query($conn, $query1);
                    list($student_usn, $student_name) = mysqli_fetch_array($result1);
                    echo "<tr>";
					echo "<td>"; echo $date; echo "</td>";
                    echo "<td>"; echo $student_usn; echo "</td>";
                    echo "<td>"; echo $student_name; echo "</td>";
                    echo "<td>"; echo $file_name; echo "</td>";
					?>
					<td><button class="btn-success" name="download" value="<?php echo $id; ?>" >Download</button></td>
					<?php
					echo "</tr>";
				}
 				echo "</table>";
				echo "</form>";
            ?>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_GET['download']))
	{
		$id = $_GET['download'];
		$query = "SELECT as_file_name, as_file_size, as_file_type, as_file_content FROM assignments WHERE as_id = '$id'";
		echo $query;
		$result = mysqli_query($conn, $query) or die('Error retrieving files');
		list($name, $size, $type, $content) = mysqli_fetch_row($result);
		header("Content-type: $type");
		header("Content-Disposition: inline; filename=$name");
		header("Content-length: $size");
		ob_clean();
		flush();
		echo $content;
	}
?>

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
	ob_end_flush();
?>
