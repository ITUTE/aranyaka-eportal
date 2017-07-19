<!DOCTYPE html>
<html>
<head>
	<script>
		alert("File Deleted!");
	</script>
</head>
<body>
	<a href="delete.php"><button id="click" name="click" value="Delete">Go Back</button></a>
</body>
</html>

<?php
	include 'dbconnect.php';
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "DELETE FROM upload WHERE id = '$id'";
		$result = mysqli_query($conn, $query) or die("Failed to Delete!");
	}
?>