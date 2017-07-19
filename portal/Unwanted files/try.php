<?php

if(isset($_POST['submit'])) 
{
	if(empty($_POST['user']) || empty($_POST['pass'])) 
	{
		$error = "Username or Password Invalid";
	}
	else 
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$conn = mysqli_connect("localhost", "root", "", "test");
		
		$query = mysqli_query($conn, "SELECT * FROM userpass WHERE password='$pass' AND username='$user'");
		
		$rows = mysqli_num_rows($query);
		if($rows==1) 
		{
			echo "You have logged in";
		}
		else 
		{
			echo "Username or Password Invalid";
		}
		mysqli_close($conn);
	}
}

?>


<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Login</title>
		<style>
			.login {
				width:360px;
				margin:50px auto;
				font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
				border-radius:10px;
				border:2px solid #ccc;
				padding:10px 40px 25px;
				margin-top:70px;
			}
			input[type=text], input[type=password] {
				width:95%;
				padding:10px;
				margin-top:8px;
				border:1px solid #ccc;
				padding-left:5px;
				font-size:16px;
				font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
			}
			input[type=submit] {
				width:100%;
				background-color:#009;
				color:#fff;
				border:2px solid #06F;
				padding:10px;
				font-size:20px;
				cursor:pointer;
				border-radius:5px;
				margin-bottom:15px;
			}
		</style>
	</head>
	
	<body>
		<div class = "login">
		<h1 align="center">Login</h1>		
		<form action="" method="post">
		<input type="text" placeholder="Username" id="user" name="user"><br/><br/>
		<input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
		<input type="submit" value="Login" name="submit"> 
		</div>
	</body>	
</html>	