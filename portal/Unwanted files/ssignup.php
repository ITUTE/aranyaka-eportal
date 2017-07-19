<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM student WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO student(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Sign-Up
        </title> 
        <link href='css/bootstrap.css' rel='stylesheet'> 
        <link rel="stylesheet" type="text/css" href="eportalhome.css">
            <style>
            </style>
    </head> 
        <body> 
            
            <div class='row'>
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-static-top'>
                        <h1><i class='glyphicon glyphicon-book'></i>E-Portal</h1>
                    </div></div></div></div>
            <div class='container'>
                <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <div class="background-image1"></div>
                    <div class="content">
                        <div class="text-center">
                            <h1><strong>Student Sign-Up</strong></h1> <hr> </div>
                        <?php
                        if ( isset($errMSG) ) {
                        ?>
                        <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                 </div>
             </div>
                <?php
   }
   ?>
                        
                        <p> Please enter your preferred ID and password 
                        </p> <div class='container-fluid'>
                        
                <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" />
                
            </div>
                    <span class="text-danger"><?php echo $nameError; ?></span>
                        </div>
                    
                
                <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
                                        
                    
                        <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
                                        <br> 
                                        <div class="text-center">
                                            <i class='glyphicon glyphicon-random'></i>
                                            
                                        <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Create a new Account</button><hr>
            <div class="form-group">
             <a href="slogin.php">Sign in Here...</a>
            </div></div>
                        
                     </div>
                    
        </div> </form></div></div>
                
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script> <script src='js/bootstrap.js'>
                </script> 
            </body> 
    </html>
    <?php ob_end_flush(); ?>
