<?php
session_start();
include 'header.php';
$id = $_SESSION['id'];
//Check user logined in if not redirect login page
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
    header("Location: login.php");
} else {
    $patientid = $_GET['id'];/** get the users id * */
    /* Function for get User by ID */
    $get_patient = $user->get_patient($patientid);
    $visit_details = $user->visit_details($patientid);
    ?>
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include 'nav.php';?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Patient Details</h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">

                            <?php if (!empty($get_patient['image'])) { ?>
                                <img style="max-width:220px; height: 320px;" src="<?php echo $get_patient['image'] ?>" /><br>
                            <?php } else { ?>
                                <img style="max-width:220px; height: 320px;" src="../images/typograph_03.png"  /><br>
                            <?php } ?>					
                        </div>
                        <label>Name: <?php echo $get_patient['firstName']; ?></label><br />
                        <label>Patient No.: <?php echo $get_patient['id']; ?></label><br />
                        <label>Emergency Contact: <?php echo $get_patient['emergency_contact']; ?></label><br />
                        <label>Blood Group: <?php echo $get_patient['blood_group']; ?></label><br />
                        <label>Race: <?php echo $get_patient['race']; ?></label><br />
                        <label>Gender: <?php echo $get_patient['gender']; ?></label><br />
                        <label>Date of Birth: <?php echo $get_patient['dob']; ?> </label><br />
                        <label>Marital Status: <?php echo $get_patient['marital_status']; ?></label><br />
                        <label>Address: <?php echo $get_patient['address1'] . " " . $get_patient['address2'] . " " . $get_patient['city'] . " " . $get_patient['state'] . " " . $get_patient['country'] . " " . $get_patient['zipcode']; ?></label><br />
                        <label>Home Phone: <?php echo $get_patient['home_phone']; ?></label><br />
                        <label>Work Phone: <?php echo $get_patient['work_phone']; ?></label><br />
                        <label>Email: <?php echo $get_patient['email']; ?></label><br />
                        <label>Insurance: <?php echo $get_patient['insurance']; ?></label><br />
                        <label></label>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Patient History
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Hospital Name</th>
                                                    <th>Doctor Name</th>
                                                    <th>Visit Reason</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php   $result = mysqli_query($mysqli,"SELECT * FROM visit_details WHERE patient_id='$patientid'");
                                                     while($data = mysqli_fetch_object($result) ):
                                             ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php echo $data->date; ?></td>
                                                    <td><?php echo $data->hospital_name; ?></td>
                                                    <td><?php echo $data->doctor_name; ?></td>
                                                    <td><?php echo $data->visit_reason; ?></td>
                                                </tr> 
                                               <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->                                
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
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
        <!-- Morris Charts JavaScript -->
        <script src="../bower_components/raphael/raphael-min.js"></script>
        <script src="../bower_components/morrisjs/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
    </body>
    </html>
<?php
}?>