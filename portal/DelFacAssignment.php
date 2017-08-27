<?php
	include 'dbconnect.php';
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "DELETE FROM group_files WHERE gf_id = '$id'";
		$result = mysqli_query($conn, $query) or die("Failed to Delete");
	}
?>
<script>
	history.go(-1);
</script>