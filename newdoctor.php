<?php 
session_start();
include 'header.php';
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
header("Location: login.php");
}
else {    
if (isset($_REQUEST['submit'])){
extract($_REQUEST);
$register = $user->addDoctor();
if ($register) {
    // Registration Success
   echo '<script type="text/javascript">';
   echo 'alert("Doctor added successfully!");';
   echo 'window.location.href = "doctorslist.php";';
   echo '</script>';
   exit();
  //echo 'Registration  successful <a href="login.php">Click here</a> to login';
} else {
    // Registration Failed
   echo '<script type="text/javascript">';
   echo 'alert("Failed to add new Patient, please try again.");';
   echo 'window.location.href = "newdoctor.php";';
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
            <h1 class="page-header">New Doctor</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Doctor's Information
                    <div style="float:right;">
                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                    <button type="reset" class="btn btn-default btn-xs">Reset</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-group" action="#" method="POST" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label>First Name</label>
                                        <input type="text" required placeholder="First Name" id="firstname" name="firstname" class="form-control" tabindex="1"> 
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Last Name</label>
                                        <input type="text" required placeholder="Last Name" id="lastname" name="lastname" class="form-control" tabindex="2">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Contact No.</label>
                                        <input type="text" required placeholder="Phone" id="phone" name="phone" class="form-control" tabindex="3">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Email</label>
                                        <input type="text" required placeholder="Email" id="email" name="email" class="form-control" tabindex="4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-5">
                                        <label>Address</label>
                                        <input type="text" required placeholder="Address" id="address" name="address" class="form-control" tabindex="5">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>City</label>
                                        <input type="text" required placeholder="City" id="city" name="city" class="form-control" tabindex="6">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>State</label>
                                        <select class="form-control" name="state" tabindex="7">
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>Zip</label>
                                        <input type="text" required placeholder="Zip" id="zip" name="zipcode" class="form-control" tabindex="8">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>Medical Speciality</label>
                                        <select class="form-control" name="medicalspeciality" tabindex="9">
                                            <option>Select</option>
                                            <option>Cardiology</option>
                                            <option>General Physician</option>
                                            <option>Dermatology</option>
                                            <option>Gastroenterology</option>
                                            <option>Family Medicine</option>
                                            <option>Internal Medicine</option>
                                            <option>Obstetrics/Gynecology</option>
                                            <option>Oncology</option>
                                            <option>Ophthalmology</option>
                                            <option>Orthopaedic Surgery</option>
                                            <option>Pediatrics</option>
                                            <option>Radiology</option>
                                            <option>Surgery, General</option>
                                            <option>Urology</option>
                                            <option>Neurology</option>
                                            <option>Allergy & Immunology</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Hospital</label>
                                        <select class="form-control" name="hospital" tabindex="10">
                                            <option>Select</option>
                                            <option>Kaiser Permanente</option>
                                            <option>California Hospital Medical Center</option>
                                            <option>Valley Care Medical Center</option>
                                            <option>Century City Hospital</option>
                                            <option>Kentfield Rehabilitation Hospital</option>
                                            <option>Memorial Hermann</option>
                                            <option>AO Fox Memorial Hospital</option>
                                            <option>UHS Binghamton General Hospital</option>
                                            <option>New York Methodist Hospital</option>
                                            <option>St Peters Hospital</option>
                                            <option>St Marys Hospital</option>
                                            <option>St Joseph Hospital</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Type</label>
                                        <select class="form-control" name="type" tabindex="11">
                                            <option>Select</option>
                                            <option>Visiting</option>
                                            <option>Permanent</option>
                                        </select>
                                    </div>
                                </div>  
                                <hr>
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
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