<?php 
 session_start();
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
                        <h1 class="page-header">Doctors List<span style="float:right;"><a href="newdoctor.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span> New Doctor</a></span></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Doctors List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Dr. ID</th>
                                                    <th width="15%">First Name</th>
                                                    <th width="15%">Last Name</th>
                                                    <th width="28%">Hospital</th>
                                                    <th width="25%">Contact No.</th>
                                                    <th width="8%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM doctors");
                                                while ($data = mysqli_fetch_object($result)):
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->doctor_id ?></td>
                                                    <td><?php echo $data->firstName ?></td>
                                                    <td><?php echo $data->lastName ?></td>
                                                    <td><?php echo $data->hospital ?></td>
                                                    <td><?php echo $data->phone ?></td>
                                                    <td>
                                                        <!--
                                                        <a href="#"><button class="btn fa fa-eye" title="view more"></button></a>
                                                        <a href="editdoctor.php?id=<?php //echo $data->doctor_id; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                    -->
                                                        <a href="deletedoctor.php?id=<?php echo $data->doctor_id; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>
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
