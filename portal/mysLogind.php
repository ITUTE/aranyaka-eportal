<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if (@$_SESSION['student'] != "" ) 
 {
	 header("Location: mysHomed.php");
	 exit;
 }
 
 $error = false;
 
 if( isset($_POST['submit']) )
 {	 	 
     // prevent sql injections/ clear user invalid inputs
     $user = trim($_POST['user']);
     $user = strip_tags($user);
     $user = htmlspecialchars($user);
	 
     // prevent sql injections / clear user invalid inputs
     $pass = trim($_POST['pass']);
     $pass = strip_tags($pass);
     $pass = htmlspecialchars($pass);
  
     // if there's no error, continue to login
     if (!$error) 
	 {
		 $query = mysqli_query($conn, "SELECT * FROM slogin WHERE password='$pass' AND username='$user'");
		 $rows = mysqli_num_rows($query);
		 
		 if($rows==1) 
		 {
			 $_SESSION['student'] = $user;
			 if (@$_SESSION['student'] != "" ) 
			 {
				 //echo $_SESSION['student'];
				 header("Location: mysHomed.php");
				 exit;
			 }
		 }
		 else 
			 echo "Invalid Credentials";
		 
		 //mysqli_close($conn);		 
	 }
 }
?>

<!doctype html>
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Login</title> 
        <link href='css/bootstrap.css' rel='stylesheet'> 
        <link rel="stylesheet" type="text/css" href="eportal.css">
        <link rel="stylesheet" type="text/css" href="index.css">
    </head> 
    <style>
      body {
              font-family: American Typewriter;
              line-height: 1.8;
              color: #f5f6f7;    
          }
          p {
              font-size: 23px; 
          }
          .margin {
              margin-bottom: 30px;
              font-size: 50px;
          }
          .margin1 { 
                margin-bottom: 13px;
          }
          .bg-1 { 
              background-image: url(home.jpg);
              background-size: cover; 
              color: #ffffff;
          }
          .bg-2 { 
              background-color: #474e5d; 
              color: #ffffff;
          }
          .bg-3 { 
              background-color: #ffffff; 
              color: darkcyan;
              padding-bottom: 10px;
          }
          .bg-4 { 
              padding-top: 0px;
              padding-bottom: 2px;
              background-color: darkcyan; 
              color: #fff;
          }
             .dropsize{
                width: 70%;
                margin-left: 15%;
                margin-right: 15%;
            }
    </style>
    <body>
     <div class="se-pre-con"></div>
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                        <h1><i class='glyphicon glyphicon-book'></i>E-Portal</h1>
                    </div>
                </div>
            </div>
        </div>
	
            <div class="container-fluid bg-1 text-center">
                <br><br><br><br><br><br>
                <i class='glyphicon glyphicon-education slide'></i> 
                    <h2 class="margin slide"><strong>Welcome, Student!</strong></h2>
                    <br>
            </div>

            <div class="container-fluid bg-3 text-center slide">    
              <h3 class="margin"><strong>Login</strong></h3><hr><br>
              <div class="row slide">
                  <form method="post" autocomplete="off"> 	
                    <p>User Email: </p> 
						<div class="form-group  dropsize slide">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
									<input  name="user" id="user" class="form-control" placeholder="Your Email" maxlength="40" required />
							</div>
						</div><br>
					
                   <p>Password:</p>
						<div class="form-group dropsize slide">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="pass" id="pass" class="form-control" placeholder="Your Password" maxlength="30" required />
							</div>
                        </div><br><hr>
              <div class="text-center"> 
				<div class="form-group">
				    <input type="submit" value="Login" name="submit" class = "btn btn-lg btn-success"> 
				</div>  
              </div> 
             </form>
            </div>
          </div>
        <footer class="container-fluid bg-4 text-center">
            <p><font size = "2">Developed by undergraduate students of CSE department.</font></p> 
        </footer>
            
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>            
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script> <script src='js/bootstrap.js'>
            </script> 
            <script>
                $(window).load(function() {
                    $(".se-pre-con").fadeOut(1500);;
                });
            </script>
        
    </body> 
</html>
<?php ob_end_flush(); ?> 