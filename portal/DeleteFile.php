<?php
	include 'dbconnect.php';
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "DELETE FROM upload WHERE id = '$id'";
		$result = mysqli_query($conn, $query) or die("Failed to Delete!");
	}
?>
<script>
	location.assign("delete.php");
</script>