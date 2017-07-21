<?php 
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Circular Event download</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/bootstrap.css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="eportal.css">
	<style>
        .heading{
            color: darkcyan;
            font: American Typewriter;
        }
    </style>
	<script>	
		/*function download_file(Id)
		{
			$.post("CEventDownload.php",
				{
					id: Id
				},
				function(data,status){
					alert(data);
			});
		}*/
	</script>
	
	<script>
		history.pushState(null, null, document.URL);
		window.addEventListener('popstate', function () {
			history.pushState(null, null, document.URL);
		});
	</script>

</head>
<body>
  <div class="se-pre-con"></div>
    <div class="container-fluid">
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                            <ul class="nav navbar-nav">
                                <li><a class="btn navbar-btn" href="index.php">Go Back</a></li>
                                <li  class="titlenav"><strong><font size=6px>#E-Portal</font></strong></li>
                                <li><a class="navbar-btn btn btn-success" href="index.php">HOME</a></li>
                            </ul>	
					</div>
				</div>
			</div>
		</div>
    </div>
	
    <div class="container-fluid slide">
        <div class="row">
            <div class="col-xs-6">
                <h2 class="heading">CIRCULARS</h2>
                    <?php
                        require_once 'dbconnect.php';

                        $query = "SELECT id, name FROM circularevent WHERE category=1";
                        $result = mysqli_query($conn, $query) or die('Error, query failed');
                        if(mysqli_num_rows($result)==0) 
                        {
                            echo "<h3> No Circulars have been uploaded yet!</h3>";	
                            die();
                        }
                        ?>
                        <?php
                        echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                                 <tr>
                                    <th>Name</th>
                                    <th></th> 
                                 </tr>";
                        while(list($id, $name) = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>"; echo $name . " "; echo "</td>";
                            ?>
                            <td><a href="CEventDownload.php?id=<?php echo $id; ?>" ><button class="btn-success">Download</button></a></td>
                        <?php
                            echo "</tr>";
                        }
                        ?>
                        <?php 
                        echo "</table>";
                    ?>
                </div>
            
				
            <div class="col-xs-6">  
                <h2 class="heading">EVENTS</h2>
                    <?php
                        require_once 'dbconnect.php';

                        $query = "SELECT id, name FROM circularevent WHERE category=2";
                        $result = mysqli_query($conn, $query) or die('Error, query failed');
                        if(mysqli_num_rows($result)==0) 
                        {
                            echo "<h3> No Events have been uploaded yet!</h3>";	
                            die();
                        }
                        ?>
                        <?php
                        echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                                 <tr>
                                    <th>Name</th>
                                    <th></th> 
                                 </tr>";
                        while(list($id, $name) = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>"; echo $name . " "; echo "</td>";
                            ?>
                            <td><a href="CEventDownload.php?id=<?php echo $id; ?>" ><button class="btn-success">Download</button></a></td>
                        <?php
                            echo "</tr>";
                        }
                        ?>
                        <?php 
                        echo "</table>";
                    ?>
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
        
</body>
</html>
