<?php
	session_start();
	ob_start();
	include 'dbconnect.php';
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
	
	<div class="row">
		<div class="container-fluid slide">
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
					echo "<p style=\"text-align:center\"><font color=\"darkcyan\" size=5px face = \"Comic sans MS\">Sorry mate, no contents uploaded for this subject!<br>Contact the concerned faculty to upload materials, or just come back later :)</font></p>";
					die();
				}
				echo "<form>";
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
					<td><button class="btn-success" name="download" value="<?php echo $id; ?>" >Download</button></td>
					<?php
					echo "</tr>";
				}
 				echo "</table>";
            ?>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_GET['download']))
	{
		$id = $_GET['download'];
		echo $id;
		$query = "SELECT name, type, size, content FROM upload WHERE id = '$id'";
		$result = mysqli_query($conn, $query) or die('Error retrieving files');
		list($name, $type, $size, $content) = mysqli_fetch_row($result);
		header("Content-type: $type");
		header("Content-Disposition: attachment; filename=$name");
		header("Content-length: $size");
		ob_clean();
		flush();
		echo $content;
	}
	
	/*if(isset($_GET['download_all']))
	{
		$result = mysqli_query($conn, $query);
		while(list($id, $sub, $name) = mysqli_fetch_array($result))
		{
			$query = "SELECT name, type, size, content FROM upload WHERE id = '$id'";
			$res = mysqli_query($conn, $query) or die('Error retrieving files');
			list($fname, $type, $size, $content) = mysqli_fetch_row($res);
			header("Content-type: $type");
			header("Content-Disposition: attachment; filename=$fname");
			header("Content-length: $size");
			ob_clean();
			//flush();
			echo $content;
		}
		flush();
	}*/
?>
