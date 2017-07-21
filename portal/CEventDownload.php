<?php
	include 'dbconnect.php';
	if(isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$query = "SELECT name, type, size, content FROM circularevent WHERE id = '$id'";
		$result = mysqli_query($conn, $query) or die('Error retrieving files');
		list($name, $type, $size, $content) = mysqli_fetch_row($result);
		header("Content-type: $type");
		header("Content-Disposition: attachment; filename=$name");
		header("Content-length: $size");
		ob_clean();
		flush();
		echo $content;
	}
?>