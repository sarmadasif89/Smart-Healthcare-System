<?php
 include 'header.php';
    
$doctorid = $_GET['id']; /** get the users id **/

	$deldoctor = $user->deldoctor($doctorid);
        
	if($deldoctor){
	 	  // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Doctor deleted!");';
           echo 'window.location.href = "doctorslist.php";';
           echo '</script>';
           exit();
	 }
?>