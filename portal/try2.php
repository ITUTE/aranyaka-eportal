<?php

	if(isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		echo $id;
	}
	else
		echo "Hi";
?>