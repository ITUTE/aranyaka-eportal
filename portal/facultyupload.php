<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: fLogin.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM faculty WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Faculty Upload</title>
        <link href='css/bootstrap.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="eportalhome.css">
	</head>
	<body>
        <div class='row'>
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-static-top'>
                        <h1><i class='glyphicon glyphicon-book'></i>E-PORTAL
                            <button type='button' class='navbar-toggle'
                                data-toggle='collapse'
                                data-target='.navbar-collapse'>
                            <span class='sr-only'>Toggle navigation</span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            </button>
                            <ul class='nav nav-tabs navbar-right collapse navbar-collapse'>
                                <a data-toggle='dropdown'><font color='black'><font size='3px'><span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></font></font>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php?logout"><font color='black'><font size='3px'><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</font></font></a>
                                    </ul></a>
                            </ul>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="container">
                <div class='style1'></div>
                    <div class="background-image" ></div>
                        <div class="content">
                            <div class="text-center">
                                <i class='glyphicon glyphicon-education'></i>
                                <h2><strong>Upload required Document</strong></h2>
                                <hr>
		                        <p>
		                        </p><div class="divider-10"></div>  
                                    <select class="selectpicker slide" title="Choose the Semester"  data-size="4">
                                        <option data-subtext="First">I</option>
                                        <option data-subtext="Second">II</option>
                                        <option data-subtext="Third">III</option>
                                        <option data-subtext="Fourth">IV</option>
                                        <option data-subtext="Fifth">V</option>
                                        <option data-subtext="Sixth">VI</option>
                                        <option data-subtext="Seventh">VII</option>
                                        <option data-subtext="Eighth">VIII</option>
                                    </select>
                                    <div class="divider-10"></div>                   
                                    <select class="selectpicker slide" title="Choose the Course"  data-size="5">
                                        <option>Depends on the selected Semester</option>
                                        <option>Depends on the selected Semester</option>
                                        <option>Depends on the selected Semester</option>
                                        <option>Depends on the selected Semester</option>
                                        <option>Depends on the selected Semester</option>
                                        <option>Depends on the selected Semester</option>
                                        <option>Depends on the selected Semester</option>
                                        
                                    </select>
                                    <div class="divider-10"></div>  
                                    <select class="selectpicker slide" title="Choose the Unit"  data-size="4">
                                        <option data-subtext="First">I</option>
                                        <option data-subtext="Second">II</option>
                                        <option data-subtext="Third">III</option>
                                        <option data-subtext="Fourth">IV</option>
                                        <option data-subtext="Fifth">V</option>
                                </select>
                                <div class="divider-10"></div> 
                                <button type="submit" class="btn btn-md btn-primary slide" name="btn-viewmat">Choose File</button>
                                <div class="divider-10"></div> 
                                <button type="submit" class="btn btn-lg btn-success slide" name="btn-viewmat">Upload</button>
                                <hr>
                                    
                            </div>
                        </div>
                
                        <div class='style1'>
                        </div>
                </div>
        </div>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
        

        <script src='js/bootstrap.js'></script>
		
</body>
</html>
<?php ob_end_flush(); ?>
		
	