<?php
session_start();
include 'header.php';
//Check user logined in if not redirect login page
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
    header("Location: login.php");
} else {    
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->addPatient();
        if ($register) {
            // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Patient successfully added");';
           echo 'window.location.href = "index.php";';
           echo '</script>';
           exit();
          //echo 'Registration  successful <a href="login.php">Click here</a> to login';
        } else {
            // Registration Failed
           echo '<script type="text/javascript">';
           echo 'alert("Failed to add new Patient please try again");';
           echo 'window.location.href = "addnewpatient.php";';
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
                <h1 class="page-header">New Patient</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Personal Details
                        <div style="float:right;">
                            <button type="submit" class="btn btn-primary btn-xs">Add Patient</button>
                            <button type="reset" class="btn btn-default btn-xs">Reset</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                 <form class="form-group" action="#" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>First Name</label>
                                            <input type="text" required placeholder="First Name" id="firstname" name="firstname" class="form-control" tabindex="1">  
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Middle Name</label>
                                            <input type="text" placeholder="First Name" id="middlename" name="middlename" class="form-control" tabindex="2">  
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Last Name</label>
                                            <input type="text" required placeholder="Last Name" id="lastname" name="lastname" class="form-control" tabindex="3">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Emergency Contact Name</label>
                                            <input type="text" required placeholder="Emergency Contact Name" id="emergencyname" name="emergencyname" class="form-control" tabindex="4">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Emergency Contact Number</label>
                                            <input type="text" required placeholder="Emergency Contact Number" id="emergencynumber" name="emergencynumber" class="form-control" tabindex="5">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Emergency Contact Relation</label>
                                            <input type="text" required placeholder="Emergency Contact Relation" id="emergencyrelation" name="emergencyrelation" class="form-control" tabindex="6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Blood Group</label>
                                            <select required name="bloodgroup" class="form-control" tabindex="7">
                                                <option>Select</option>
                                                <option>O+</option>
                                                <option>A+</option>
                                                <option>B+</option>
                                                <option>AB+</option>
                                                <option>O-</option>
                                                <option>A-</option>
                                                <option>B-</option>
                                                <option>AB-</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Race</label>
                                            <select required name="race" class="form-control" tabindex="8">
                                                <option>Select</option>
                                                <option>White</option>
                                                <option>Black or African American</option>
                                                <option>American Indian and Alaska Native</option>
                                                <option>Asian</option>
                                                <option>Native Hawaiian and other Pacific Islander</option>
                                                <option>Hispanic or Latino</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Gender</label>
                                            <select required name="gender" class="form-control" tabindex="9">
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Date of Birth</label>
                                            <input class="span2 form-control" id="dob" name="dob" type="text" placeholder="mm/dd/yyyy" tabindex="10">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Marital Status</label>
                                            <select required name="maritalstatus" class="form-control" tabindex="11">
                                                <option>Select</option>
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Divorced</option>
                                                <option>Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" required  placeholder="Address" name="address" class="form-control" tabindex="12"> 
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Home Phone</label>
                                            <input type="text" required  placeholder="Home Phone" name="homephone" class="form-control" tabindex="13">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Work Phone</label>
                                            <input type="text" required  placeholder="Work Phone" name="workphone" class="form-control" tabindex="14">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Email Address</label>
                                            <input type="text" required  placeholder="Email Address" name="email" class="form-control" tabindex="15">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Insurance Provider</label>
                                            <input type="text" required  placeholder="Insurance Provider" name="insuranceprovider" class="form-control" tabindex="16">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Insurance Type</label>
                                            <input type="text" required  placeholder="Insurance Provider" name="insurancetype" class="form-control" tabindex="17">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Insurance Card No</label>
                                            <input type="text" required  placeholder="Insurance Card No" name="insurancecardno" class="form-control" tabindex="18">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Insurance Contact</label>
                                            <input type="text" required  placeholder="Insurance Contact" name="insurancephone" class="form-control" tabindex="19">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="submit" class="btn btn-primary">Add Patient</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
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