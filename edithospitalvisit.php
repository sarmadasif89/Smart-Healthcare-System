<?php
session_start();
$p_id = $_SESSION['patient_id'];
$visit_reason_id = $_GET['id']; /** get the id **/
//echo $visit_reason_id;

include 'header.php';
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
header("Location: login.php");
}
else { 
 $get_visitreason = $user->get_visitreason($visit_reason_id); 
 
    if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $update = $user->updateVisitReason($visit_reason_id);
    if ($update) {
        // Registration Success
       echo '<script type="text/javascript">';
       echo 'alert("Reason for Visit fully added");';
       echo 'window.location.href = "hospitalvisit.php";';
       echo '</script>';
       exit();
      //echo 'Registration  successful <a href="login.php">Click here</a> to login';
    } else {
        // Registration Failed
       echo '<script type="text/javascript">';
       echo 'alert("Failed to add Reason for Visit please try again");';
       echo 'window.location.href = "newhospitalvisit.php";';
       echo '</script>';
       exit();
    }
}
?>
<?php include 'head.php'; ?>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <?php include 'nav.php'; ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Visit</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Visiting Details                      
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="from-group" action="#" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Reason</label>
                                            <textarea class="form-control" name="reason" tabindex="1"> <?php echo $get_visitreason['reason']; ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Symptoms</label>
                                            <textarea class="form-control" name="symptoms" tabindex="2"><?php echo $get_visitreason['symptoms']; ?></textarea>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Condition</label>
                                            <select class="form-control" name="condition" tabindex="3">
                                                <option>Select</option>
                                                <option value="Normal" <?php if($get_visitreason['conditions']=="Normal") echo 'selected="selected"'; ?>>Normal</option>
                                                <option value="Immediate Attention" <?php if($get_visitreason['conditions']=="Immediate Attention") echo 'selected="selected"'; ?>>Immediate Attention</option>
                                                <option value="Severe" <?php if($get_visitreason['conditions']=="Severe") echo 'selected="selected"'; ?>>Severe</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Visit type</label>
                                            <select class="form-control" name="visittype" tabindex="4">
                                                <option>Select</option>
                                                <option value="Emergency" <?php if($get_visitreason['visittype']=="Emergency") echo 'selected="selected"'; ?>>Emergency</option>
                                                <option value="Regular Check-up" <?php if($get_visitreason['visittype']=="Regular Check-up") echo 'selected="selected"'; ?>>Regular Check-up</option>
                                                <option value="Appointment" <?php if($get_visitreason['visittype']=="Appointment") echo 'selected="selected"'; ?>>Appointment</option>
                                                <option value="Walk-in" <?php if($get_visitreason['visittype']=="Walk-in") echo 'selected="selected"'; ?>>Walk-in</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Precautions taken prior to visit</label>
                                            <textarea class="form-control" name="precautions_taken_prior_to_visit" tabindex="5"><?php echo $get_visitreason['precautions_taken_prior_to_visit']; ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php 
                                            $option = $user->getDoctorsList();
                                        ?>
                                        <div class="form-group col-lg-4">
                                            <label>Visiting Doctor</label>
                                            <select class="form-control" name="visiting_doctor" tabindex="6">
                                                <option>Select</option>
                                                <?php echo $option; ?>
                                            </select>
                                        </div>											
                                    </div>
                                    <hr>
                                    <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                    <button type="submit" name="submit" class="btn btn-primary">Update Reason</button>                                    
                                </form>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<?php
include 'footer.php';
}
?>
