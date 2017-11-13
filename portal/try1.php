<!DOCTYPE html>
<html>
<body>
	<form method="post" autocomplete="off">
		 <input type="text" name="name" class="form-control" pattern="[A-Za-z ]{1,50}$" title="Enter only letters as name" id="name" placeholder="Enter name">
		 <input type="submit" value="Submit" name="submit" class = "btn btn-lg btn-success">
	</form>
	
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		echo "<script>history.go(-1);</script>";
		echo $_POST['name'];
	}
?>