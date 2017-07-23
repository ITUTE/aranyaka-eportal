<?php
	 $semester = $_GET['q'];
	 if($semester==3)
	 {
		 ?>
		 <ul>
			 <li>Data Structures in C - DSC<a class="btn btn-success" href="download.php?sub=12CS31">View</a></li><hr>
			 <li>Digital Logic Design - DLD<a class="btn btn-success" href="download.php?sub=12CS32">View</a></li><hr>
		     <li>Computer Organisation and Arch. - COA<a class="btn btn-success" href="download.php?sub=12CS33">View</a></li><hr>
			 <li>Discrete Mathematical Structures - DMS <a class="btn btn-success" href="download.php?sub=12CS34">View</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==4)
	 {
		 ?>
		 <ul>
			 <li>Theory of Computations - TOC   <a class="btn btn-success" href="download.php?sub=12CS41">View</a></li><hr>
			 <li>Operating Systems - OS   <a class="btn btn-success" href="download.php?sub=12CS42">View</a></li><hr>
		     <li>Design and Analysis of Algorithms - DAA  <a class="btn btn-success" href="download.php?sub=12CS43">View</a></li><hr>
			 <li>Object Oriented Programming - OOPS   <a class="btn btn-success" href="download.php?sub=12CS44">View</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==5)
	 {
		 ?>
		 <ul>
			 <li>Computer Networks - CN-I   <a class="btn btn-success" href="download.php?sub=12CS51">View</a></li><hr>
			 <li>Microprocessors and Microcontrollers - MPMC  <a class="btn btn-success" href="download.php?sub=12CS52">View</a></li><hr>
		     <li>Database Management Systems - DBMS   <a class="btn btn-success" href="download.php?sub=12CS53">View</a></li><hr>
			 <li>HSS   <a class="btn btn-success" href="download.php?sub=12CS54">View</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==6)
	 {
		 ?>
		 <ul>
			 <li>Software Engineering - SE    <a class="btn btn-success" href="download.php?sub=12CS61">View</a></li><hr>
			 <li>Computer Networks 2 - CN-II   <a class="btn btn-success" href="download.php?sub=12CS62">View</a></li><hr>
		     <li>System Software and Compiler Design - SSCD    <a class="btn btn-success" href="download.php?sub=12CS63">View</a></li><hr>
			 <li>ETCS   <a class="btn btn-success" href="download.php?sub=12CS64">View</a></li><hr>
		 </ul>
		 <?php
	 }
	 elseif($semester==7)
	 {
		 ?>
		 <ul>
			 <li>High Performance Computing - HPC    <a class="btn btn-success" href="download.php?sub=12CS71">View</a></li><hr>
			 <li>Computer Graphics - CG   <a class="btn btn-success" href="download.php?sub=12CS72">View</a></li><hr>
		     <li>HSS   <a class="btn btn-success" href="download.php?sub=12CS73">View</a></li><hr>
			 <li>MinP   <a class="btn btn-success" href="download.php?sub=12CS74">View</a></li><hr>
		 </ul>
		 <?php
	 }
     elseif($semester==1)
     {
         ?>
         <ul>
			 <li>Applied Mathematics - I    <a class="btn btn-success" href="download.php?sub=16MA11">View</a></li><hr>
			 <li>Engineering Chemistry  <a class="btn btn-success" href="download.php?sub=16CH12">View</a></li><hr>
		     <li>Programming in C - PIC   <a class="btn btn-success" href="download.php?sub=16CS13">View</a></li><hr>
			 <li>Basics of Electronics Engineering   <a class="btn btn-success" href="download.php?sub=16EC14">View</a></li><hr>
             <li>Basics of Mechanical Engineering   <a class="btn btn-success" href="download.php?sub=16ME15">View</a></li><hr>
		 </ul>
        	 <?php
	 }
     elseif($semester==2)
     {
         ?>
         <ul>
			 <li>Applied Mathematics - II<a class="btn btn-success" href="download.php?sub=16MA21">View</a></li><hr>
			 <li>Engineering Physics   <a class="btn btn-success" href="download.php?sub=16PH22">View</a></li><hr>
		     <li>Elements of Civil Engineering   <a class="btn btn-success" href="download.php?sub=16CV23">View</a></li><hr>
             <li>Computer Aided Engineering Drawing   <a class="btn btn-success" href="download.php?sub=16ME24">View</a></li><hr>
             <li>Elements of Electrical Engineering   <a class="btn btn-success" href="download.php?sub=16EE25">View</a></li><hr>
			 <li>CONSTITUTION OF INDIA AND LEGAL STUDIES FOR ENGINEERS   <a class="btn btn-success" href="download.php?sub=16HSC26">View</a></li><hr>
		 </ul>
        <?php
      }
?>