<?php
 include 'header.php';
    
 $med_det_id = $_GET['id']; /** get the id **/

	$delMedication = $user->delMedication($med_det_id);
	if($delMedication){
	 	  // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Medication deleted!");';
           echo 'window.location.href = "medications.php";';
           echo '</script>';
           exit();
	 }
?>