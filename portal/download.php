<?php
	session_start();
	ob_start();
	require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html> 
<head>
    <title>File download</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/bootstrap.css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="eportal.css">
	
	<script>
		history.pushState(null, null, document.URL);
		window.addEventListener('popstate', function () {
			history.pushState(null, null, document.URL);
		});
	</script>
	<style>
		.logout{
			margin-right:3%;
		}
	</style>
</head>
<body>
	<div class="se-pre-con"></div>
    <div class="container-fluid slide">
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                        <ul class="nav navbar-nav">
                            <li><a class="btn navbar-btn" href="mysHomed.php">Go Back</a></li>
                            <li class="titlenav"><strong><font size=6px>#E-Portal</font></strong></li>
                            <li><a class="navbar-btn btn btn-success" href="index.php">HOME</a></li>
                        </ul>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script>
        $(window).load(function() {
            $(".se-pre-con").fadeOut(1500);;
        });
    </script>
	
	<br><br>
	<div class="row">
		<div class="container-fluid">
			<?php
				if(@$_GET['sub']!="") 
				{
					$subject = $_GET['sub'];
					$_SESSION['subject'] = $subject;
				}
				$subject = $_SESSION['subject'];
				$query = "SELECT id, subject, name FROM upload WHERE subject = '$subject'";
				$result = mysqli_query($conn, $query) or die('Error, query failed');
				if(mysqli_num_rows($result)==0) 
				{
					echo "<p> Sorry mate, no contents uploaded for this subject!<br>Contact the concerned faculty to upload materials, or just come back later :)</p>";
					die();
				}
				?>
				<?php
					echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
						 <tr>
							<th>File Name</th>
							<th></th> 
						 </tr>";
					while(list($id, $sub, $name) = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>"; echo $sub . " " . $name . " "; echo "</td>";
						?>
						<td><a href="DownloadFile.php?id=<?php echo $id; ?>" ><button class="btn-success" class="right">Download</button></a></td>
						<?php
						echo "</tr>";
					}
				?>
				<?php 
					echo "</table>";
				?>
		</div>
	</div>
</body>
</html>
