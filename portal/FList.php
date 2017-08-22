<script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").on('show.bs.modal', function(event){
                var button = $(event.relatedTarget);  // Button that triggered the modal
                var titleData = button.data('title'); // Extract value from data-* attributes
                $(this).find('.modal-title').text(titleData + ' Form');
            });
        });
</script>
<style>
    .bs-example{
        margin-top: 18%;
    }

</style>
<?php
	session_start();
	include 'dbconnect.php';
	$semester = $_GET['q'];
	if(isset($_SESSION['fac_sem_code']))
		unset($_SESSION['fac_sem_code']);
	$_SESSION['fac_sem_code'] = $semester;
	$query = "SELECT c.course_name, c.course_code FROM course c, dept_sem_course d WHERE d.dsc_course_code=c.course_code AND d.dsc_fac_dept_code = '" . $_SESSION['fac_dept'] . "' AND d.dsc_sem_code = '$semester'";     
	$result = mysqli_query($conn, $query) or die("Error");
	if(mysqli_num_rows($result)==0)
	{
		echo "No subject for this semester!";
		die();
	}
	echo "<ul>";
	while(list($course_name,$course_code) = mysqli_fetch_array($result))
	{
		?>
			<li><?php echo $course_name;?>&nbsp;&nbsp;<a data-toggle="modal" data-target="#myModal" class="btn btn-success">Upload</a></li><hr>
            <div class="#">
                            <!-- Button HTML (to Trigger Modal) -->
                            
                            <!--
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-title="Feedback">Feedback</button><br>
                            -->
                            <!-- Modal HTML -->
                            
                            <div id="myModal" class="modal fade bs-example">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Upload</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Title:</label>
                                                    <textarea type="text" class="form-control" id="recipient-name"></textarea>
                                                </div>
                                            </form>
                                            <br>
                                            <form method="POST" enctype="multipart/form-data"> 
                                                <label class="custom-file-upload btn btn-lg btn-info slide" for="userfile">
                                                    <input type="file" name="userfile" id="userfile"/>Choose File
                                                </label>
                                            </form>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div> 
		<?php
	}
	echo "</ul>";
?>
	 