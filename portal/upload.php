<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                            <ul class="nav navbar-nav">
                                <li><a class="btn navbar-btn" href="myfHomed.php">Go Back</a></li>
                                <li  class="titlenav"><strong><font size=6px>#E-Portal</font></strong></li>
                                <li><a class="navbar-btn btn btn-success" href="index.php">HOME</a></li>
                            </ul>	
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <div class="container-fluid bg-1 text-center"><br><br>
		<i class='glyphicon glyphicon-education slide'></i> 
        <h2 class="margin slide"><strong>Upload Home</strong></h2><br>
    </div>
    
        
    <div class="container-fluid bg-3 text-center slide">    
        <h3 class="margin"><strong>Upload document</strong></h3><hr><br>
        <div class="row slide">
            <p class="slide">Choose file to be uploaded!</p>
			<form method="POST" enctype="multipart/form-data"> 
                <label class="custom-file-upload btn btn-lg btn-info slide" for="userfile">
                    <input name="userfile" type="file" id="userfile"/>
                    Choose File
                </label><br><br>
                <p class="slide">Now hit Upload to upload your document</p>
                <input class="btn-lg btn-success slide" name="upload" type="submit" id="upload" value=" Upload ">
            </form><br><br><hr>
                  
        </div> 
    </div>
        
    <div class="container-fluid bg-3 text-center slide">    
        <div class="row slide">
			<p>To see information about syllabus <a href="infotablef.php" class="btn btn-md btn-info">Click Here</a></p>
        </div> 
    </div>
        
	<footer class="container-fluid bg-4 text-center">
        <p><font size = "2">Developed by undergraduate students of CSE department.</font></p> 
    </footer>
                
</body>
</html>
	
<?php

	$allowed = array('jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf', 'xls', 'xlsm', 'ppt', 'pptx');

	if(isset($_POST['upload']))
	{
		if($_FILES['userfile']['size'] > 0)
		{
			require_once 'dbconnect.php';
			
			$fileName = $_FILES['userfile']['name'];
			$tmpName  = $_FILES['userfile']['tmp_name'];
			$fileSize = $_FILES['userfile']['size'];
			$fileType = $_FILES['userfile']['type'];
			
			$file_ext = explode(".", $fileName);
			$file_ext = strtolower(end($file_ext));
			
			if(in_array($file_ext, $allowed))
			{
				$fp = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
				if(!get_magic_quotes_gpc())
					$fileName = addslashes($fileName);
				
				$subject = $_GET['sub'];
				$TeacherID = $_SESSION['id'];
				$query = "INSERT INTO upload (Tid, subject, name, size, type, content) VALUES ('$TeacherID', '$subject', '$fileName', '$fileSize', '$fileType', '$content')";

				mysqli_query($conn, $query) or die('Error, query failed'); 
				echo "<script type='text/javascript'>alert('File $fileName uploaded');</script>";
			}
			else
				echo "<script type='text/javascript'>alert('FileType Not Supported');</script>";
			
			mysqli_close($conn);
		}
		else
			echo "<script type='text/javascript'>alert('Please Choose a File to Upload');</script>";
	} 
?> 
