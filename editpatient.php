<?php
session_start();
include 'header.php';
 $id = $_SESSION['id'];

    //Check user logined in if not redirect login page
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
      header ("Location: login.php");
}
 else {   
  $patientid = $_GET['id']; /** get the id **/
  //echo $patientid;
 /*Function for get User by ID*/
  $get_patient = $user->get_patient($patientid); 
  
  if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->updatePatient($patientid);
        if ($register) {
            // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("Patient success fully added");';
           echo 'window.location.href = "index.php";';
           echo '</script>';
           exit();
          //echo 'Registration  successful <a href="login.php">Click here</a> to login';
        } else {
            // Registration Failed
           echo '<script type="text/javascript">';
           echo 'alert("Failed to add new Patient please try again");';
           echo 'window.location.href = "editpatient.php";';
           echo '</script>';
           exit();
        }
    }    
?>

<?php include 'head.php';?>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <?php include 'nav.php'; ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Patient</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Update Personal Details                       
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                 <form class="form-horizontal group-border-dashed" action="#" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>First Name</label>
                                            <input type="text" required placeholder="First Name" id="firstname" name="firstname" value="<?php echo $get_patient['firstName']; ?>" class="form-control" tabindex="1">  
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Middle Name</label>
                                            <input type="text" required placeholder="First Name" id="middlename" name="middlename" value="<?php echo $get_patient['middleName']; ?>" class="form-control" tabindex="2">  
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Last Name</label>
                                            <input type="text" required placeholder="Last Name" id="lastname" name="lastname" value="<?php echo $get_patient['lastName']; ?>" class="form-control" tabindex="3">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Emergency Contact Name</label>
                                            <input type="text" required placeholder="Emergency Contact Name" id="emergencyname" name="emergencyname" value="<?php echo $get_patient['emergencyName']; ?>" class="form-control" tabindex="4">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Emergency Contact Number</label>
                                            <input type="text" required placeholder="Emergency Contact Number" id="emergencynumber" name="emergencynumber" value="<?php echo $get_patient['emergencyPhone']; ?>" class="form-control" tabindex="5">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Emergency Contact Relation</label>
                                            <input type="text" required placeholder="Emergency Contact Relation" id="emergencyrelation" name="emergencyrelation" value="<?php echo $get_patient['emergencyRelation']; ?>" class="form-control" tabindex="6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Blood Group</label>
                                            <select required name="bloodgroup" class="form-control" tabindex="7">
                                                <option>Select</option>
                                                <option value="O+"<?php if ($get_patient['blood_group'] === 'O+') echo 'selected="selected"'?>>O+</option>
                                                <option value="A+"<?php if ($get_patient['blood_group'] === 'A+') echo 'selected="selected"'?> >A+</option>
                                                <option value="B+"<?php if ($get_patient['blood_group'] === 'B+') echo 'selected="selected"'?> >B+</option>
                                                <option value="AB+"<?php if ($get_patient['blood_group'] === 'AB+') echo 'selected="selected"'?> >AB+</option>
                                                <option value="O-"<?php if ($get_patient['blood_group'] === 'O-') echo 'selected="selected"'?> >O-</option>
                                                <option value="A-"<?php if ($get_patient['blood_group'] === 'A-') echo 'selected="selected"'?> >A-</option>
                                                <option value="B-"<?php if ($get_patient['blood_group'] === 'B-') echo 'selected="selected"'?> >B-</option>
                                                <option value="AB-"<?php if ($get_patient['blood_group'] === 'AB-') echo 'selected="selected"'?> >AB-</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Race</label>
                                            <select required name="race" class="form-control" tabindex="8">
                                                <option>Select</option>
                                                <option value="While"<?php if ($get_patient['race'] === 'While') echo 'selected="selected"'?>>While</option>
                                                <option value="Black or African American"<?php if ($get_patient['race'] === 'Black or African American') echo 'selected="selected"'?>>Black or African American</option>
                                                <option value="American Indian and Alaska Native"<?php if ($get_patient['race'] === 'American Indian and Alaska Native') echo 'selected="selected"'?>>American Indian and Alaska Native</option>
                                                <option value="Asian"<?php if ($get_patient['race'] === 'Asian') echo 'selected="selected"'?>>Asian</option>
                                                <option value="Native Hawaiian and other Pacific Islander"<?php if ($get_patient['race'] === 'Native Hawaiian and other Pacific Islander') echo 'selected="selected"'?>>Native Hawaiian and other Pacific Islander</option>
                                                <option value="Hispanic or Latino"<?php if ($get_patient['race'] === 'Hispanic or Latino') echo 'selected="selected"'?>>Hispanic or Latino</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Gender</label>
                                            <select required name="gender" class="form-control" tabindex="9">
                                                <option>Select</option>
                                                <option value="Male"<?php if ($get_patient['gender'] === 'Male') echo 'selected="selected"'?>>Male</option>
                                                <option value="Female"<?php if ($get_patient['gender'] === 'Female') echo 'selected="selected"'?>>Female</option>
                                                <option value="Other"<?php if ($get_patient['gender'] === 'Other') echo 'selected="selected"'?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Date of Birth</label>
                                            <input class="span2 form-control" id="dob" name="dob" type="text" value="<?php echo $get_patient['dob']; ?>" placeholder="mm/dd/yyyy" tabindex="10">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Marital Status</label>
                                            <select required name="maritalstatus" class="form-control" tabindex="11">
                                                <option>Select</option>
                                                <option value="Single"<?php if ($get_patient['marital_status'] === 'Single') echo 'selected="selected"'?>>Single</option>
                                                <option value="Married"<?php if ($get_patient['marital_status'] === 'Married') echo 'selected="selected"'?>>Married</option>
                                                <option value="Married"<?php if ($get_patient['marital_status'] === 'Married') echo 'selected="selected"'?>>Married</option>
                                                <option value="Married"<?php if ($get_patient['marital_status'] === 'Married') echo 'selected="selected"'?>>Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" required  placeholder="Address" name="address" value="<?php echo $get_patient['address']; ?>" class="form-control" tabindex="12"> 
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Home Phone</label>
                                            <input type="text" required  placeholder="Home Phone" name="homephone" value="<?php echo $get_patient['home_phone']; ?>" class="form-control" tabindex="13">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Work Phone</label>
                                            <input type="text" required  placeholder="Work Phone" name="workphone" value="<?php echo $get_patient['work_phone']; ?>" class="form-control" tabindex="14">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Email Address</label>
                                            <input type="text" required  placeholder="Email Address" name="email" value="<?php echo $get_patient['email']; ?>" class="form-control" tabindex="15">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Insurance Provider</label>
                                            <input type="text" required  placeholder="Insurance Provider" name="insuranceprovider" value="<?php echo $get_patient['insuranceProvider']; ?>" class="form-control" tabindex="16">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Insurance Type</label>
                                            <input type="text" required  placeholder="Insurance Provider" name="insurancetype" value="<?php echo $get_patient['insuranceType']; ?>" class="form-control" tabindex="17">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Insurance Card No</label>
                                            <input type="text" required  placeholder="Insurance Card No" name="insurancecardno" value="<?php echo $get_patient['insuranceCardNo']; ?>" class="form-control" tabindex="18">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Insurance Contact</label>
                                            <input type="text" required  placeholder="Insurance Contact" name="insurancephone" value="<?php echo $get_patient['insurancePhone']; ?>" class="form-control" tabindex="19">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="submit" class="btn btn-primary">Update Patient</button>                                    
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