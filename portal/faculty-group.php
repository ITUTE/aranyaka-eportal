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
        <title>Your Group</title>
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
            .bs-example{
                    margin-top: 18%;
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
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#myModal").on('show.bs.modal', function(event){
                        var button = $(event.relatedTarget);  // Button that triggered the modal
                        var titleData = button.data('title'); // Extract value from data-* attributes
                        $(this).find('.modal-title').text(titleData + ' Form');
                    });
                });
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
                                $query = "SELECT fac_name from faculty_login WHERE fac_id = " . $_SESSION['id'];
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
            <font size=50><i class='glyphicon glyphicon-globe slide'></i></font>
            <h2 class="margin slide"><strong>Group</strong></h2><br>
        </div>


		<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a data-toggle="tab" href="#home">Assignments</a></li>
			  <li><a data-toggle="tab" href="#ann">Announcements</a></li>
			  <li><a data-toggle="tab" href="#mat">Materials</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			    <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Assignments</strong></h3><hr><br>
							<div class="row slide">
                                <table class="table table-hovered">
                                    <tr>
                                        <th>Assignment name</th>
                                        <th><a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">+Add Assignment</a></th>
                                    </tr>
                                </table>
                    			<p><font size=3px>Here you can view all the assignments assigned to your group.</font></p>
								<br>
                  			</div>
            	</div>
			</div>
			<div id="ann" class="tab-pane fade">
			    	 <div class="container-fluid bg-3 text-center">
						<h3 class="margin slide"><strong>Announcements</strong></h3><hr><br>
			            	<div class="row slide">
								<p>Here you can see all the announcements.</p>
                                <table class="table table-hovered">
                                    <tr>
                                        <th>Announcement name</th>
                                        <th><a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">+ Add Announcement</a></th>
                                    </tr>
                                </table>
										<br>
			            	</div>
		       		 </div>
			</div>
			<div id="mat" class="tab-pane fade">
			    <div class="container-fluid bg-3">
						<h3 class="margin slide text-center"><strong>Materials</strong></h3><hr>
							<div class="row slide">

                                <p class='text-center'><font size=3px>Here you can view all the private materials your group is associated with.</font></p>
                                <table class="table table-hovered">
                                    <tr>
                                        <th>Material name</th>
                                        <th><a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">+ Add Material</a></th>
                                    </tr>
                                </table>
                                <br>
                  			</div>
            	</div>
			</div>
		</div>
    
        <div id="myModal" class="modal fade bs-example text-center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Upload</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><font color="darkcyan">Assignment Description</font></label>
                                <textarea type="text" class="form-control" id="recipient-name"></textarea>
                            </div>
                        </form>
                        <br>
                        <form method="POST" enctype="multipart/form-data"> 
                            <label class="custom-file-upload btn btn-lg btn-info slide" for="userfile">
                                <input type="file" name="userfile" id="userfile"/>Choose File
                            </label>
                        </form>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success">Upload</button>
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
