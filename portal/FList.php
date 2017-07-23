<?php
	 $semester = $_GET['q'];
	 if($semester==3)
	 {
		 ?>
		 <ul>
			 <li>Applied Mathematics - III <a class="btn btn-success" href="upload.php?sub=12MA31">&nbsp;&nbsp;Upload</a></li><hr>
             <li>Engineering Materials - EM  <a class="btn btn-success" href="upload.php?sub=12ME32">&nbsp;&nbsp;Upload</a></li><hr>
             <li>Data Structures in C - DSC  <a class="btn btn-success" href="upload.php?sub=12CS33">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Digital Logic Design - DLD   <a class="btn btn-success" href="upload.php?sub=12CS34">&nbsp;&nbsp;Upload</a></li><hr>
		     <li>Computer Organisation and Arch. - COA   <a class="btn btn-success" href="upload.php?sub=12CS35">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Discrete Mathematical Structures - DMS   <a class="btn btn-success" href="upload.php?sub=12CS36">&nbsp;&nbsp;Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==4)
	 {
		 ?>
		 <ul>
             <li>Applied Mathematics - IV <a class="btn btn-success" href="upload.php?sub=12MA41">&nbsp;&nbsp;Upload</a></li><hr>
             <li>Environmental Science and Biology for Engineers - ESBE  <a class="btn btn-success" href="upload.php?sub=12EB42">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Theory of Computations - TOC   <a class="btn btn-success" href="upload.php?sub=12CS43">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Operating Systems - OS   <a class="btn btn-success" href="upload.php?sub=12CS44">&nbsp;&nbsp;Upload</a></li><hr>
		     <li>Design and Analysis of Algorithms - DAA   <a class="btn btn-success" href="upload.php?sub=12CS45">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Object Oriented Programming - OOPS   <a class="btn btn-success" href="upload.php?sub=12CS46">&nbsp;&nbsp;Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==5)
	 {
		 ?>
		 <ul>
			 <li>Computer Networks - CN-I   <a class="btn btn-success" href="upload.php?sub=12CS51">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Microprocessors and Microcontrollers - MPMC   <a class="btn btn-success" href="upload.php?sub=12CS52">&nbsp;&nbsp;Upload</a></li><hr>
		     <li> Database Management Systems - DBMS   <a class="btn btn-success" href="upload.php?sub=12CS53">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>HSS   <a class="btn btn-success" href="upload.php?sub=12CS54">&nbsp;&nbsp;Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==6)
	 {
		 ?>
		 <ul>
			 <li>Software Engineering - SE   <a class="btn btn-success" href="upload.php?sub=12CS61">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Computer Networks 2 - CN-II   <a class="btn btn-success" href="upload.php?sub=12CS62">&nbsp;&nbsp;Upload</a></li><hr>
		     <li>System Software and Compiler Design - SSCD   <a class="btn btn-success" href="upload.php?sub=12CS63">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>ETCS   <a class="btn btn-success" href="upload.php?sub=12CS64">&nbsp;&nbsp;Upload</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==7)
	 {
		 ?>
		 <ul>
			 <li>High Performance Computing - HPC   <a class="btn btn-success" href="upload.php?sub=12CS71">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>Computer Graphics - CG   <a class="btn btn-success" href="upload.php?sub=12CS72">&nbsp;&nbsp;Upload</a></li><hr>
		     <li>HSS   <a class="btn btn-success" href="upload.php?sub=12CS73">&nbsp;&nbsp;Upload</a></li><hr>
			 <li>MinP   <a class="btn btn-success" href="upload.php?sub=12CS74">&nbsp;&nbsp;Upload</a></li><hr>
		 </ul>
		 <?php
	 }
     elseif($semester==1)
     {
         ?>
         <ul>
			 <li>Applied Mathematics - I    <a class="btn btn-success" href="upload.php?sub=16MA11">Upload</a></li><hr>
			 <li>Engineering Chemistry  <a class="btn btn-success" href="upload.php?sub=16CH12">Upload</a></li><hr>
		     <li>Programming in C - PIC   <a class="btn btn-success" href="upload.php?sub=16CS13">Upload</a></li><hr>
			 <li>Basics of Electronics Engineering   <a class="btn btn-success" href="upload.php?sub=16EC14">Upload</a></li><hr>
             <li>Basics of Mechanical Engineering   <a class="btn btn-success" href="uplaod.php?sub=16ME15">Upload</a></li><hr>
		 </ul>
        	 <?php
	 }
     elseif($semester==2)
     {
         ?>
         <ul>
			 <li>Applied Mathematics - II<a class="btn btn-success" href="upload.php?sub=16MA21">Upload</a></li><hr>
			 <li>Engineering Physics   <a class="btn btn-success" href="upload.php?sub=16PH22">Upload</a></li><hr>
		     <li>Elements of Civil Engineering   <a class="btn btn-success" href="upload.php?sub=16CV23">Upload</a></li><hr>
             <li>Computer Aided Engineering Drawing   <a class="btn btn-success" href="upload.php?sub=16ME24">Upload</a></li><hr>
             <li>Elements of Electrical Engineering   <a class="btn btn-success" href="upload.php?sub=16EE25">Upload</a></li><hr>
			 <li>CONSTITUTION OF INDIA AND LEGAL STUDIES FOR ENGINEERS   <a class="btn btn-success" href="upload.php?sub=16HSC26">Upload</a></li><hr>
		 </ul>
        <?php
      }
?>