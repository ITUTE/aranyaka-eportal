<?php
	ob_start();
	session_start();
	include 'dbconnect.php';
	
	if(@$_SESSION['student'] == "")
	{
		header("Location: index.php");
		exit;
	}
	if(isset($_GET['grp_code']))
		$_SESSION['grp_code'] = $_GET['grp_code'];
?>

<!DOCTYPE html>
<html>
    <head>		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your Group</title>
        <link href='css/bootstrap.css' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="eportal.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
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
            .bs-example{
                    margin-top: 10%;
                }
		</style>
    </head>

    <body>
	
		<script>
			$(document).ready(function(){
				$(".abc").click(function() {
					var val = $(this).attr('value');
					$("#submit").val(val);
				});
			});
		</script>
		
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
                                $query = "SELECT stu_name from student_login WHERE stu_id = " . $_SESSION['id'];
                                $result = mysqli_query($conn, $query);
                                list($name) = mysqli_fetch_array($result);
                                echo "Hi, " .  "<strong><font size = 3>" . $name . "</font></strong>";
							?>
							<span class="caret"></span>&nbsp;
						</a>
						<ul class="dropdown-menu">
							<li><a href="#home"><font color = "darkcyan">Profile</font></a></li>
							<li><a><form method="POST"><input type="submit" value="Logout " name="Logout"/></form></a></li>
						</ul>
					</li>
				</ul>
            </div>
		  </div>
        </nav>

        <div class="container-fluid bg-1 text-center"><br><br><br>
            <font size=50><i class='glyphicon glyphicon-globe slide'></i></font>
            <h2 class="margin slide"><strong>Group</strong></h2><br>
        </div>

		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#home">Assignments</a></li>
			<li><a data-toggle="tab" href="#ann">Announcements</a></li>
			<li><a data-toggle="tab" href="#mat">Materials</a></li>
		</ul>
		
		<div id="myModal" class="modal fade bs-example text-center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Your Submission</h4>
                    </div>
					<form method="POST" enctype="multipart/form-data" action="uploadStudent.php">
						<div class="modal-body"> 						
                            <label class="custom-file-upload btn btn-lg btn-info slide" for="userfile">
                                <input type="file" name="userfile" id="userfile"/>Choose File
                            </label><br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="submit" name="submit" id="submit" value="" class="btn btn-success">Upload</button>
						</div>
					</form><br>
                </div>
            </div>
        </div>   

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			    <div class="container-fluid bg-3 text-center">
					<h3 class="margin slide"><strong>Assignments</strong></h3>
					<p><font size=3px>Here you can view all the assignments assigned to your group.</font></p>
					<div class="row slide">
						<table class="table table-hovered">
							<tr>
								<th class="text-center">Assignment name</th>
							</tr>
							<?php
								include 'dbconnect.php';
								$grp_code = $_SESSION['grp_code'];
								$query = "SELECT gf_id, gf_file_name, gf_description FROM group_files WHERE gf_grp_code = '$grp_code' AND gf_category=0";
								$result = mysqli_query($conn, $query);
								while(list($id, $name, $description) = mysqli_fetch_array($result))
								{
									echo "<tr><td>" . $name . " " . $description;
									$query = "SELECT as_id FROM assignments WHERE as_num = '$id' AND as_stu_id = '" . $_SESSION['id'] . "'";
									$result1 = mysqli_query($conn, $query);
									if(mysqli_num_rows($result1)==0)
									{
										?>
										<a class="btn btn-info abc" data-toggle="modal" href="#myModal" value="<?php echo $id;?>">Submit Assignment</a><br><br>
										</td>
										<?php
									}
									if(mysqli_num_rows($result1)!=0)
									{
										list($as_id) = mysqli_fetch_array($result1);
										?>
										<form><td><button class="btn-success" name="download" value="<?php echo $as_id; ?>" >View</button></td></form>
										<td><button class="btn-danger" id= <?php echo $as_id; ?> onclick="del(this.id)">Delete</button></td>
										<?php
									}
									echo "</tr>";
								}
							?>
						</table><br>
                  	</div>
				</div>
			</div>
			<!--
			<div id="ann" class="tab-pane fade">
			    <div class="container-fluid bg-3 text-center">
					<h3 class="margin slide"><strong>Announcements</strong></h3>
					<p><font size=3px>Here you can see all the announcements.</font></p>
		           	<div class="row slide">
						<a class="btn btn-info abc" data-toggle="modal" href="#myModal" value="1">+Add Announcement</a><br><br>
						<table class="table table-hovered">
							<tr>
								<th class="text-center">Announcement name</th>
							</tr>
							<?php
								/*include 'dbconnect.php';
								$query = "SELECT gf_id, gf_file_name, gf_description FROM group_files WHERE gf_grp_code = '$grp_code' AND gf_category=1 AND gf_fac_id = '" . $_SESSION['id'] . "'";
								$result = mysqli_query($conn, $query);
								while(list($id, $name, $description) = mysqli_fetch_array($result))
								{
									echo "<tr><td>" . $name . " ";
									?>
									<a value="1" href="submission.php?gf_id=<?php echo $id;?>"><?php echo $description;?></a>
									</td></tr>
									<?php
								}*/
							?>
						</table><br>
			        </div>
		       	</div>
			</div>
			
			<div id="mat" class="tab-pane fade">
			    <div class="container-fluid bg-3 text-center">
					<h3 class="margin slide text-center"><strong>Materials</strong></h3>
					<p><font size=3px>Here you can view all the private materials your group is associated with.</font></p>
					<div class="row slide">
						<a class="btn btn-info abc" data-toggle="modal" href="#myModal" value="2">+Add Material</a><br><br>
						<table class="table table-hovered">
							<tr>
								<th class="text-center">Material name</th>
							</tr>
							<?php
								/*include 'dbconnect.php';
								$query = "SELECT gf_id, gf_file_name, gf_description FROM group_files WHERE gf_grp_code = '$grp_code' AND gf_category=2 AND gf_fac_id = '" . $_SESSION['id'] . "'";
								$result = mysqli_query($conn, $query);
								while(list($id, $name, $description) = mysqli_fetch_array($result))
								{
									echo "<tr><td>" . $name . " ";
									?>
									<a href="submission.php?gf_id=<?php echo $id;?>"><?php echo $description;?></a>
									</td></tr>
									<?php
								}*/
							?>
						</table><br>
                  	</div>
            	</div>
			</div>
		</div>
		-->
    	
		<footer class="container-fluid bg-4 text-center">
			<p><font size = "2">Developed by undergraduate students of CSE department.</font></p>
			<p><a href="http://www.rvce.edu.in/" target = "_blank"><font size=2px color="white">R.V. College of Engineering</font></a></p>
		</footer>
		
		<script>
			function del(id)
			{
				if (confirm("Confirm") == true) {
					location.assign("DelStuAssignment.php?id="+id);
				} 
				else {
					die();
				}
			}
		</script>

        <script>
            $(window).load(function() {
                $(".se-pre-con").fadeOut(1500);;
            });
        </script>
    </body>
</html>

<?php
	if(isset($_POST['Logout']))
	{
		session_destroy();
		header("Location: index.php");
		exit;
	}
	if(isset($_GET['download']))
	{
		$id = $_GET['download'];
		$query = "SELECT as_file_name, as_file_type, as_file_size, as_file_content FROM assignments WHERE as_id = '$id'";
		$result = mysqli_query($conn, $query) or die('Error retrieving files');
		list($name, $type, $size, $content) = mysqli_fetch_row($result);
		header("Content-type: $type");
		header("Content-Disposition: inline; filename=$name");
		header("Content-length: $size");
		ob_clean();
		flush();
		echo $content;
	}
	ob_end_flush();
?>