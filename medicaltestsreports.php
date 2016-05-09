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
                        <h1 class="page-header">Medical Tests & Reports<span style="float:right;"><a href="newtest.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span> New Test</a></span></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Recent Tests
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Date</th>
                                                    <th width="25%">Test</th>
                                                    <th width="15%">Corresponding Visit</th>
                                                    <th width="22%">Consulting Doctor</th>
                                                    <th width="18%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM testsreports WHERE patient_id='$p_id' AND recent='1'");
                                                while ($data = mysqli_fetch_object($result)):
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->datetime ?></td>
                                                    <td><?php echo $data->test ?></td>
                                                    <td><a href="showhospitalvisit.php?id=<?php echo $data->visit_id; ?>" id="<?php echo $data->visit_id ?>"><button class="btn btn-primary btn-xs">view corresponding visit</button></a></td>
                                                    <td><?php echo $user->getDoctorName($data->doctor_id) ?></td>
                                                    <td>
                                                        <!--
                                                        <button onclick="document.getElementById('my_file').click()" class="btn fa fa-paperclip" type="file" name="reportattachment" title="attach report"></button>
                                                        <input type="file" id="my_file" style="display: none;" />
                                                        <a href="#"><button class="btn fa fa-file-pdf-o" title="view report"></button></a>
                                                    -->
                                                        <a href="editmedicaltest.php?id=<?php echo $data->id; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                        <a href="deletemedicaltest.php?id=<?php echo $data->id; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>
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
                <!-- /.panel panel-default" -->
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> All-time Test History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Date</th>
                                                    <th width="25%">Test</th>
                                                    <th width="15%">Corresponding Visit</th>
                                                    <th width="22%">Consulting Doctor</th>
                                                    <th width="18%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM testsreports WHERE patient_id='$p_id'");
                                                while ($data = mysqli_fetch_object($result)):
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->datetime ?></td>
                                                    <td><?php echo $data->test ?></td>
                                                    <td><a href="showhospitalvisit.php?id=<?php echo $data->visit_id; ?>" id="<?php echo $data->visit_id ?>"><button class="btn btn-primary btn-xs">view corresponding visit</button></a></td>
                                                    <td><?php echo $user->getDoctorName($data->doctor_id) ?></td>
                                                    <form id="attachmentform" method="POST" enctype="multipart/form-data">
                                                        <td>
                                                            <!--
                                                            <button onclick="document.getElementById('my_file').click()" class="btn fa fa-paperclip" type="file" name="reportattachment" title="attach report"></button>
                                                            <input type="file" id="my_file" name="reportattachment2" style="display: none;" />
                                                            <a href="#"><button class="btn fa fa-file-pdf-o" title="view report"></button></a>
                                                            -->
                                                            <a href="editmedicaltest.php?id=<?php echo $data->id; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                            <a href="deletemedicaltest_alltime.php?id=<?php echo $data->id; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>
                                                        </td>
                                                    </form>
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
                <!-- /.panel panel-default" -->
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
