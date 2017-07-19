<?php
	session_start();
	ob_start();
    require_once 'dbconnect.php';
	
	if(@$_GET['sub']!="") 
	{
		$subject = $_GET['sub'];
		$_SESSION['subject'] = $subject;
	}
	$subject = $_SESSION['subject'];
    $query = "SELECT id, subject, name FROM upload WHERE subject = '$subject'";
    $result = mysqli_query($conn, $query) or die('Error, query failed');
	if(mysqli_num_rows($result)==0) 
	{
		die("No content uploaded for this subject!");
	}
	?>
	<?php
    echo "<table class=/"table table-striped table-hover/" style=/"width:100%/">
             <tr>
                <th>File Name</th>
                <th></th> 
             </tr>";
    while(list($id, $sub, $name) = mysqli_fetch_array($result))
	{
		echo "<tr>";
        echo "<td>"; echo $sub . " " . $name . " "; echo "</td>";
        ?>
        <td><a href="DownloadFile.php?id=<?php echo $id; ?>" ><button class="btn-success">Download</button></a></td>
    <?php
        echo "</tr>";
	}
	?>
	<?php 
    echo "</table>";
?>
<html> 
<head>
    <title>File download</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/bootstrap.css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="eportal.css">
<script>	
	function download_file(Id)
	{
		$.post("DownloadFile.php",
			{
				id: Id
			},
			function(data,status){
				alert(data);
		});
	}
</script>
</head>
</html>