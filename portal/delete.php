<!DOCTYPE html>
<html>
<body>
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
	
	<?php
    echo "<table class=/"table table-striped table-hover/" style=/"width:100%/">
             <tr>
                <th>File Name</th>
                <th>Download</th> 
                <th>Delete</th>
             </tr>";
    while(list($id, $sub, $name) = mysqli_fetch_array($result))
	{
		echo "<tr>";
        echo "<td>"; echo $sub . " " . $name . " "; echo "</td>";
        ?>
        <td><a href="DownloadFile.php?id=<?php echo $id; ?>" ><button class="btn-success">Download</button></a></td>
        <td><a href="DeleteFile.php?id=<?php echo $id; ?>" ><button class="btn-danger">Delete</button></a></td>
    <?php
        echo "</tr>";
	}
	?>
	<?php 
    echo "</table>";
?>
</body>
</html>