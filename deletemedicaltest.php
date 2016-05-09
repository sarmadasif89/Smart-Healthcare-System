<?php
 include 'header.php';
    
$medtestid = $_GET['id']; /** get the users id **/

	$delmedtest = $user->delmedicaltest($medtestid);
        
	if($delmedtest){
	 	  // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Test deleted!");';
           echo 'window.location.href = "medicaltestsreports.php";';
           echo '</script>';
           exit();
	 }
?>