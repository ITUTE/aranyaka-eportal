<?php
	include 'dbconnect.php';
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "DELETE FROM assignments WHERE as_id = '$id'";
		$result = mysqli_query($conn, $query) or die("Failed to Delete!");
	}
?>
<script>
	location.assign("student-group.php");
</script>