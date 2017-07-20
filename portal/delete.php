<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="eportal.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	
	<style>
		.logout {
			margin-right:3%;
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
    <div class="row">
        <div class='col-xs-12'>
            <div class="style"> 
                <div class='navbar navbar-inverse navbar-fixed-top'>
                        <ul class="nav navbar-nav">
                            <li><a href="myfHomed.php" title="Go Back"><img src="back.png" style="width:50px;height:50px;"></a></li>
                            <li><strong><font size=5px>E-Portal</font></strong></li>
                            <li><a class="btn btn-success" href="index.php">HOME</a></li>
                        </ul>
						<ul class="nav nav-tabs navbar-right logout">
                            <li><form method="POST"><input class="btn navbar-btn btn-danger" type="submit" value="Logout " name="Logout"/></form></li>
						</ul>		
                </div>
            </div>
        </div>
    </div>
	<br><br><br><br>
    <div class="row">
		<div class="container-fluid">
            <?php
                session_start();
                include 'dbconnect.php';
                $Tid = $_SESSION['id'];
                $query = "SELECT id, subject, name FROM upload WHERE Tid = '$Tid'";
                $result = mysqli_query($conn, $query) or die('Error, query failed');

                if(mysqli_num_rows($result)==0) 
                {
                    die("You have not uploaded any content yet!");
                }

                echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                         <tr>
                            <th></th>
                            <th></th> 
                            <th></th>
                         </tr>";
                while(list($id, $sub, $name) = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>"; echo $sub . " " . $name . " "; echo "</td>";
                    ?>
                    <td><a href="DownloadFile.php?id=<?php echo $id; ?>" ><button class="btn-success">Download</button></a></td>
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
			location.assign("DeleteFile.php?id="+id);
		} 
		else {
			die();
		}
	}
</script>
</body>
</html>