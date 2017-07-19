<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 
  $_SESSION['user']='girish';
 
 if( !isset($_SESSION['user']) ) {
  header("Location: fLogin.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM flogin WHERE username=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
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
                                     
                                <?php
                                            $sql = "SELECT * FROM tbl_country ORDER BY country_name";
                                            try {
                                                $stmt = $DB->prepare($sql);
                                                $stmt->execute();
                                                $results = $stmt->fetchAll();
                                            } catch (Exception $ex) {
                                                echo($ex->getMessage());
                                            }
                                            ?>
                                        <label>Country:
                                                <select name="country" onChange="showState(this);">
                                                    <option value="">Please Select</option>
                                                    <?php foreach ($results as $rs) { ?>
                                                        <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["country_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                        </label>
                                    
                                <div class="divider-10"></div>                   
    
                                        <div id="output1"></div>

                                <div class="divider-10"></div>  
                                    
                                        <div id="output2"></div>
                               
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
        <script src="jquery-1.9.0.min.js"></script>
        <script>
                    function showState(sel) {
                        var country_id = sel.options[sel.selectedIndex].value;
                        $("#output1").html("");
                        $("#output2").html("");
                        if (country_id.length > 0) {

                            $.ajax({
                                type: "POST",
                                url: "fetch_state.php",
                                data: "country_id=" + country_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output1").html(html);
                                }
                            });
                        }
                    }

                    function showCity(sel) {
                        var state_id = sel.options[sel.selectedIndex].value;
                        if (state_id.length > 0) {
                            $.ajax({
                                type: "POST",
                                url: "fetch_city.php",
                                data: "state_id=" + state_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output2').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output2").html(html);
                                }
                            });
                        } else {
                            $("#output2").html("");
                        }
                    }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
        

        <script src='js/bootstrap.js'></script>
        
		
</body>
</html>
<?php ob_end_flush(); ?>
		
	