<?php
 include 'header.php';
    
$patientid = $_GET['id']; /** get the users id **/

	$delpatient = $user->delpatiente($patientid);
        
	if($delpatient){
	 	  // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Patient Success Deleted From System");';
           echo 'window.location.href = "index.php";';
           echo '</script>';
           exit();
	 }
?>