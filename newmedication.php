<?php
session_start();
$p_id = $_SESSION['patient_id'];
include 'header.php';
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
header("Location: login.php");
} else {
if (isset($_REQUEST['submit'])) {
extract($_REQUEST);
$register = $user->addMedication();
if ($register) {
    // Registration Success
    echo '<script type="text/javascript">';
    echo 'alert("Medications success fully added");';
    echo 'window.location.href = "medications.php";';
    echo '</script>';
    exit();
    //echo 'Registration  successful <a href="login.php">Click here</a> to login';
} else {
    // Registration Failed
    echo '<script type="text/javascript">';
    echo 'alert("Failed to add new Medications please try again");';
    echo 'window.location.href = "newmedication.php";';
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
                <h1 class="page-header">New Medication</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Medication Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal group-border-dashed" action="#" method="POST" enctype="multipart/form-data" >
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Medicine</label>
                                            <input type="text" required placeholder="Medicine" id="medicine" name="medicine" class="form-control" tabindex="1"> 
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <select class="form-control" name="quantity" tabindex="3">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Directions</label>
                                            <textarea class="form-control" rows="3" name="ditections" tabindex="4"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                    <button type="submit" name="submit" class="btn btn-default">Add</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            
                            <!-- /.col-lg-6 (nested) -->
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