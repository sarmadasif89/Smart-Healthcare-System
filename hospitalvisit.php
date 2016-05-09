<?php 
 session_start();
  $p_id = $_SESSION['patient_id'];
  include 'header.php';
?>
<?php include 'head.php';?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'nav.php';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hospital Visits<span style="float:right;"><a href="newhospitalvisit.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span> New Hospital Visit</a></span></h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
 <?php
include 'footer.php';
?>

