<?php
session_start();
include 'header.php';
$p_id = $_SESSION['patient_id'];
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
                            <img style="max-width:220px; height: 320px;" src="images/dp.jpg" /><br>			
                        </div>
                        <label>Name: <?php echo $get_patient['firstName'].' '.$get_patient['lastName']; ?></label><br />
                        <label>Patient Card No.: <?php echo $get_patient['patientno']; ?></label><br />
                        <label>Emergency Contact: <?php echo $get_patient['emergencyPhone']; ?></label><br />
                        <label>Blood Group: <?php echo $get_patient['blood_group']; ?></label><br />
                        <label>Race: <?php echo $get_patient['race']; ?></label><br />
                        <label>Gender: <?php echo $get_patient['gender']; ?></label><br />
                        <label>Date of Birth: <?php echo $get_patient['dob']; ?> </label><br />
                        <label>Marital Status: <?php echo $get_patient['marital_status']; ?></label><br />
                        <label>Address: <?php echo $get_patient['address'] ?></label><br />
                        <label>Home Phone: <?php echo $get_patient['home_phone']; ?></label><br />
                        <label>Work Phone: <?php echo $get_patient['work_phone']; ?></label><br />
                        <label>Email: <?php echo $get_patient['email']; ?></label><br />
                        <label>Insurance: <?php echo $get_patient['insuranceProvider']; ?></label><br />
                        <label></label>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Visit History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="10%">Date</th>
                                                    <th width="20%">Hospital</th>
                                                    <th width="15%">Doctor</th>
                                                    <th width="35%">Reason</th>
                                                    <th width="15%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM visit_reason where patient_id='$p_id' ORDER BY visit_reason_id desc");
                                                while ($data = mysqli_fetch_object($result)):
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->visit_reason_id ?></td>
                                                    <td><?php echo $data->added_time ?></td>
                                                    <td><?php echo $user->getHospitalName($data->hospital_id) ?></td>
                                                    <td><?php echo $data->visiting_doctor ?></td>
                                                    <td><?php echo $data->reason ?></td>
                                                    <td>
                                                        <a href=""><button class="btn fa fa-eye" title="view more"></button></a>
                                                        <a href="edithospitalvisit.php?id=<?php echo $data->visit_reason_id; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                        <a href="deletehospitalvisit.php?id=<?php echo $data->visit_reason_id; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    endwhile;
                                                 ?>
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