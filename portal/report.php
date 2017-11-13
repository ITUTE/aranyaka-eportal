<?php
	ob_start();
	include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reports</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/bootstrap.css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="eportal.css">
	
	<script>
		var dept = $("#department").find(":selected").text();
		alert(dept);
	</script>
</head>
<body>
	<div>
		<h1>REPORTS</h1>
	</div>
	
	<div>
            <p class="slide">Select Department:</p>
			<form method="post">
			<select class="form-control col-md-6 slide dropsize" name="department" id="department" onkeyup="func()" onkeydown="func()">
                              <option value="">Select Department</option>
                              <option value="cse">Computer Science Engineering</option>
                              <option value="ece">Electronics and Communucations</option>
                              <option value="cv">Civil Enginering</option>
                              <option value="me">Mechanical Engineering</option>
                              <option value="is">Information Science</option>
                              <option value="eee">Electrical Engineering</option>
                              <option value="ch">Chemical Engineering</option>
			</select>
			<input class="btn-md btn-success slide" name="dept" type="submit" id="dept" value=" Get Report "/>
			</form><br>
	</div>
</body>
</html>

<?php

	if(isset($_POST['department']))
	{
		$dept_code = $_POST['department'];
		$query = "SELECT fac_name, material_count, assignment_count FROM faculty_login WHERE fac_dept_code = '$dept_code'";
		//echo $query;
		$result = mysqli_query($conn, $query);
		$col = "Name" . "\t" . "Materials Added" . "\t" . "Assignments Given" . "\t";
		$data = '';
		while($row = mysqli_fetch_row($result))
		{
			$rowData = '';
			foreach ($row as $value)
			{
				$value = '"' . $value . '"' . "\t";
				$rowData .=$value;
			}
			$data .=trim($rowData) . "\n"; 
		}
		header("Content-type: application/octet-stream");  
		header("Content-Disposition: attachment; filename=Report.xls");  
		header("Pragma: no-cache");  
		header("Expires: 0");  
		ob_clean();
		flush();
		echo ucwords($col) . "\n" . $data . "\n"; 
	}

?>