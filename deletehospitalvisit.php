<?php
 include 'header.php';
    
 $visit_reason_id = $_GET['id']; /** get the id **/

	$delVisitReason = $user->delVisitReason($visit_reason_id);
	if($delVisitReason){
	 	  // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Visit Reason Success Deleted From System");';
           echo 'window.location.href = "hospitalvisit.php";';
           echo '</script>';
           exit();
	 }
?>