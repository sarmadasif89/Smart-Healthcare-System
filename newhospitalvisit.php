<?php
session_start();
$p_id = $_SESSION['patient_id'];
//echo $p_id;
include 'header.php';
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
header("Location: login.php");
}
else {    
if (isset($_REQUEST['submit'])){
extract($_REQUEST);
$register = $user->addReasonForVisit();
if ($register) {
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
                <h1 class="page-header">Reason for Visit</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Visiting Details
                        <div style="float:right;">
                            <button type="submit" class="btn btn-primary btn-xs">Add Reason</button>
                            <button type="reset" class="btn btn-default btn-xs">Reset</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="from-group" action="#" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Reason</label>
                                            <textarea class="form-control" name="reason" tabindex="1"> </textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Symptoms</label>
                                            <textarea class="form-control" name="symptoms" tabindex="2"></textarea>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Condition</label>
                                            <select class="form-control" name="condition" tabindex="3">
                                                <option>Select</option>
                                                <option>Normal</option>
                                                <option>Immediate Attention</option>
                                                <option>Severe</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Visit type</label>
                                            <select class="form-control" name="visittype" tabindex="4">
                                                <option>Select</option>
                                                <option>Emergency</option>
                                                <option>Regular Check-up</option>
                                                <option>Appointment</option>
                                                <option>Walk-in</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Precautions taken prior to visit</label>
                                            <textarea class="form-control" name="precautions_taken_prior_to_visit" tabindex="5"> </textarea>
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
                                    <button type="submit" name="submit" class="btn btn-primary">Add Reason</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <span style="border-right: solid 1px #eee; margin-right: 15px; margin-left: 11px;"></span>
                                    <a href="newmedication.php" class="btn btn-primary">Add Medications</a>
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
