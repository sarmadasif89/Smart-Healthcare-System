<?php
include 'header.php';
//Check user logined in if not redirect login page
  if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->reg_user();
        if ($register) {
            // Registration Success
           echo '<script type="text/javascript">';
           echo 'alert("User success fully added");';
           echo 'window.location.href = "login.php";';
           echo '</script>';
           exit();
          //echo 'Registration  successful <a href="login.php">Click here</a> to login';
        } else {
            // Registration Failed
           echo '<script type="text/javascript">';
           echo 'alert("Failed to add new user please try again");';
           echo 'window.location.href = "index.php";';
           echo '</script>';
           exit();
        }
    }
 else {   
    
?>

<?php include 'head.php';?>
<body>
<div id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">               
<a class="navbar-brand" href="index.php">Smart Healthcare v1.0</a>
</div>                  
</nav>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">New Patient Entry</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Patient Details
</div>
<div class="panel-body">
<div class="row">
    <div class="col-lg-6">
        <form class="form-horizontal group-border-dashed" action="#" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label>User Name</label>
                 <input type="text" required placeholder="User Name" id="username" name="username" class="form-control" tabindex="1">
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <div class="form-group">
                <label>Password</label>
                 <input type="text" required placeholder="Password" id="password" name="password" class="form-control" tabindex="2">              
            </div>
            <div class="form-group">
                <label>First Name</label>
                 <input type="text" required placeholder="First Name" id="firstname" name="firstname" class="form-control" tabindex="3">  
            </div>
            <div class="form-group">
                <label>Last Name</label>
                 <input type="text" required placeholder="Last Name" id="lastname" name="lastname" class="form-control" tabindex="4">              
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" id="file" name="support_images[]" multiple="multiple" tabindex="5" />  
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" required  placeholder="Email Address" id="email" name="email" class="form-control" tabindex="6">
            </div>
             <div class="form-group">
                <label>Address 1</label>
               <input type="text" required  placeholder="Address1" name="address1" class="form-control" tabindex="7">
            </div>
             <div class="form-group">
                <label>Address 2</label>
                <input type="text" required  placeholder="Address2" name="address2" class="form-control" tabindex="8"> 
            </div>
             <div class="form-group">
                <label>City</label>
                <input type="text" required placeholder="City" name="city" class="form-control" tabindex="9">
            </div>
             <div class="form-group">
                <label>State</label>
                <input type="text" required  placeholder="State" name="state" class="form-control" tabindex="10">  
            </div>
             <div class="form-group">
                <label>Country</label>
                <input type="text" required placeholder="Country" name="country" class="form-control" tabindex="11">
            </div>
             <div class="form-group">
                <label>Zip Code</label>
                <input type="text" required placeholder="Zip Code" name="zipcode" class="form-control" tabindex="12">  
            </div>
            <div class="form-group">
                <label>Emergency Contact</label>
                <input type="text" required placeholder="Emergency Contact" name="emergency_contact" class="form-control" tabindex="13">
            </div>
            <div class="form-group">
                <label>Home Phone</label>
                <input type="text" required placeholder="Home Phone" name="home_phone" class="form-control" tabindex="14">
            </div>
            <div class="form-group">
                <label>Work Phone</label>
                <input type="text" required placeholder="Work Phone" name="work_phone" class="form-control" tabindex="15"> 
            </div>
            <div class="form-group">
                <label>Blood Group</label>
               <input type="text" required placeholder="Blood Group" name="blood_group" class="form-control" tabindex="16">
            </div>
            <div class="form-group">
                <label>Race</label>
                <input type="text" required placeholder="Race" name="race" class="form-control" tabindex="17">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" class="span2 form-control" name="dob" placeholder="mm/dd/yyyy" tabindex="18">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select required name="gender" class="form-control" tabindex="19">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>                                    
                </select>
            </div>
            <div class="form-group">
                <label>Marital Status</label>
                <select required name="marital_status" class="form-control" tabindex="20">
                    <option>Select Marital Status</option>
                    <option>Unmarried</option>
                    <option>Married</option>
                    <option>Divorced</option>
                    <option>Widowed</option>                    
                </select>
            </div>
            <div class="form-group">
                <label>Smoker_Drinker</label>
                <select required name="smoker_drinker" class="form-control" tabindex="21">
                     <option>Select Smoker Drinker</option>
                    <option>Yes</option>
                    <option>No</option>                                       
                </select>
            </div>
            <div class="form-group">
                <label>Insurance</label>
                <input type="text" required placeholder="Insurance" name="insurance" class="form-control" tabindex="22"> 
            </div>
            <div class="form-group">
                <label>Allergies</label>
                <textarea name="allergies" class="form-control" rows="3" tabindex="23"></textarea>
            </div>
            <div class="form-group">
                <label>Past History</label>
                <textarea name="past_history" class="form-control" rows="3" tabindex="24"></textarea>  
            </div>            
            <button type="submit" name="submit" class="btn btn-default" tabindex="25">Add</button>
            <button type="reset" name="reset" class="btn btn-default" tabindex="26">Reset</button>       
    </div> 
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

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
 <?php } ?>