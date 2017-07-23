<?php
    session_start();
    include 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="eportal.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	
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
                                <li><a class="btn navbar-btn" href="myfHomed.php">Go Back</a></li>
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
    
    <div class="container-fluid slide">
        <div class="row">
            <?php
                $Tid = $_SESSION['id'];
                $query = "SELECT id, name FROM circularevent WHERE Tid = '$Tid' AND category=1";
                $result = mysqli_query($conn, $query) or die('Error, query failed');

                if(mysqli_num_rows($result)==0) 
                {
					echo "<p style=\"text-align:center\"><font color=\"darkcyan\" size=5px face = \"Comic sans MS\">Sir/Ma'am, no circular has been uploaded by you!</font></p>";
                    die();
                }

                echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                         <tr>
                            <th></th>
                            <th></th> 
                            <th></th>
                         </tr>";
                while(list($id, $name) = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>"; echo $name . " "; echo "</td>";
                    ?>
                    <td><button class="btn-danger" id= <?php echo $id; ?> onclick="del(this.id)">Delete</button></td>
                <?php
                    echo "</tr>";
                }
                ?>
                <?php 
                echo "</table>";
            ?>
        </div>
	</div>

	<script>
		function del(id)
		{
			if (confirm("Confirm") == true) {
				location.assign("CDeleteFile.php?id="+id);
			} 
			else {
				die();
			}
		}
	</script>
</body>
</html>