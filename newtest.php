<?php 
session_start();
$p_id = $_SESSION['patient_id'];
include 'header.php';
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
header("Location: login.php");
}
else {    
if (isset($_REQUEST['submit'])){
extract($_REQUEST);
$register = $user->addTest();
if ($register) {
    // Registration Success
   echo '<script type="text/javascript">';
   echo 'alert("Test added successfully!");';
   echo 'window.location.href = "medicaltestsreports.php";';
   echo '</script>';
   exit();
  //echo 'Registration  successful <a href="login.php">Click here</a> to login';
} else {
    // Registration Failed
   echo '<script type="text/javascript">';
   echo 'alert("Failed to add new Test, please try again.");';
   echo 'window.location.href = "newtest.php";';
   echo '</script>';
   exit();
}
}

?>
<?php include 'head.php';?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'nav.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Test</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Test Details
                            <div style="float:right;">
                            <button type="submit" class="btn btn-primary btn-xs">Add</button>
                            <button type="reset" class="btn btn-default btn-xs">Reset</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="#" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label>Test</label>
                                                <input class="form-control" type="text" id="test" name="test" required placeholder="test" tabindex="1" />
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Date</label>
                                                <input class="span2 form-control" id="date" name="date" type="text" placeholder="mm/dd/yyyy" tabindex="2" />
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Visit</label>
                                                <select class="form-control" disabled="true" id="visit" name="visit" tabindex="3" />
                                                    <option value="">Current</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label>Precautions</label>
                                                <textarea class="form-control" id="precautions" name="precautions" tabindex="4"> </textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <?php 
                                            $option = $user->getDoctorsList();
                                        ?>
                                            <div class="form-group col-lg-4">
                                                <label>Consulting Doctor</label>
                                                <select class="form-control" name="consulting_doctor" id="consulting_doctor" tabindex="5" >
                                                    <option>Select</option>
                                                    <?php echo $option; ?>
                                                </select>
                                            </div>                                          
                                        </div>
                                        <hr>
                                        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                        <button type="submit" name="submit" class="btn btn-primary" tabindex="6" >Add</button>
                                        <button type="reset" class="btn btn-default" tabindex="7" >Reset</button>
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
    <!-- /#wrapper -->
<?php 
include 'footer.php'; 
}?>