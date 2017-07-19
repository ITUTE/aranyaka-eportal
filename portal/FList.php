<?php
	 $semester = $_GET['q'];
	 if($semester==3)
	 {
		 ?>
		 <ul>
			 <li>DSC  <a class="btn btn-info" href="upload.php?sub=12CS31">Upload</a></li><hr>
			 <li>DLD   <a class="btn btn-info" href="upload.php?sub=12CS32">Upload</a></li><hr>
		     <li>COA   <a class="btn btn-info" href="upload.php?sub=12CS33">Upload</a></li><hr>
			 <li>DMS   <a class="btn btn-info" href="upload.php?sub=12CS34">Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==4)
	 {
		 ?>
		 <ul>
			 <li>TOC   <a class="btn btn-info" href="upload.php?sub=12CS41">Upload</a></li><hr>
			 <li>OS   <a class="btn btn-info" href="upload.php?sub=12CS42">Upload</a></li><hr>
		     <li>DAA   <a class="btn btn-info" href="upload.php?sub=12CS43">Upload</a></li><hr>
			 <li>OOPS   <a class="btn btn-info" href="upload.php?sub=12CS44">Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==5)
	 {
		 ?>
		 <ul>
			 <li>CN-I   <a class="btn btn-info" href="upload.php?sub=12CS51">Upload</a></li><hr>
			 <li>MPMC   <a class="btn btn-info" href="upload.php?sub=12CS52">Upload</a></li><hr>
		     <li>DBMS   <a class="btn btn-info" href="upload.php?sub=12CS53">Upload</a></li><hr>
			 <li>HSS   <a class="btn btn-info" href="upload.php?sub=12CS54">Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==6)
	 {
		 ?>
		 <ul>
			 <li>SE   <a class="btn btn-info" href="upload.php?sub=12CS61">Upload</a></li><hr>
			 <li>CN-II   <a class="btn btn-info" href="upload.php?sub=12CS62">Upload</a></li><hr>
		     <li>SSCD   <a class="btn btn-info" href="upload.php?sub=12CS63">Upload</a></li><hr>
			 <li>ETCS   <a class="btn btn-info" href="upload.php?sub=12CS64">Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==7)
	 {
		 ?>
		 <ul>
			 <li>HPC   <a class="btn btn-info" href="upload.php?sub=12CS71">Upload</a></li><hr>
			 <li>CG   <a class="btn btn-info" href="upload.php?sub=12CS72">Upload</a></li><hr>
		     <li>HSS   <a class="btn btn-info" href="upload.php?sub=12CS73">Upload</a></li><hr>
			 <li>MinP   <a class="btn btn-info" href="upload.php?sub=12CS74">Upload</a></li><hr>
		 </ul>
		 <?php
	 }

?>
