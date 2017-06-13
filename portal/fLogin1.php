<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT userId, userName, userPass FROM faculty WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Faculty Login</title> 
            <link href='css/bootstrap.css' rel='stylesheet'> 
            <link rel="stylesheet" type="text/css" href="eportal.css">
                <style> 
                </style>
    </head> 
    <body>
        <div class='row'>
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-static-top'>
                        <h1><i class='glyphicon glyphicon-book'></i>E-Portal</h1>
                    </div>
                </div>
            </div>
        </div>
          
        <div class='container'> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="background-image"></div>
                <div class="content">
                    <div class="text-center">
                        <h2><strong>Login</strong></h2> <hr>
                        <div class="form-group">
            
                        </div>
<?php
    if ( isset($errMSG) ) {
    
?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
                    </div>
                    <p> To continue, please enter your Username and Password 
                    </p> <div class='container-fluid'> 
                    <div class="form-group">
            	       <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	             <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                        <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            </div>
                <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
                    <div class="text-center"> 
                    <i class='glyphicon glyphicon-random'></i>
                    
                                <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
                                        <i class='glyphicon glyphicon-search'></i>
                                        <br>
                                    <div class="btn-group">
                                <a class="btn btn-lg btn-success" href="http://www.google.com" target="_blank">Login with Google</a>
                                        </div><hr>
                        <div class="form-group">
             <a href="fSignup2.php">Sign Up Here...</a>
            </div>

                                    </div>
                </div> </form></div>
                        
                
         
                
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script> <script src='js/bootstrap.js'>
                </script> 
            </body> 
    </html>
<?php ob_end_flush(); ?>
