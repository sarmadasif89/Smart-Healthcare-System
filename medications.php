<?php 
 session_start();
 $p_id = $_SESSION['patient_id'];
 //echo $p_id;
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
                        <h1 class="page-header">Medications<span style="float:right;"><a href="newmedication.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span> New Medications</a></span></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Current Medicines
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
                                                    <th width="25%">Medicine</th>
                                                    <th width="10%">Quantity</th>
                                                    <th width="35%">Directions</th>
                                                    <th width="15%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM medication_details where patient_id= '$p_id' AND current='1' ORDER BY med_det_id desc");
                                                while ($data = mysqli_fetch_object($result)):
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->added_time ?></td>
                                                    <td><?php echo $data->medicines ?></td>
                                                    <td><?php echo $data->quantity ?></td>
                                                    <td><?php echo $data->direction ?></td>                                                   
                                                    <td>
                                                        <a href="#"><button class="btn fa fa-eye" title="view more"></button></a>
                                                        <a href="editmedication.php?id=<?php echo $data->med_det_id; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                        <a href="deletemedication.php?id=<?php echo $data->med_det_id; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> All-time Medicine History
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
                                                    <th width="25%">Medicine</th>
                                                    <th width="10%">Quantity</th>
                                                    <th width="35%">Directions</th>
                                                    <th width="15%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM medication_details where patient_id= '$p_id' ORDER BY med_det_id desc ");
                                                while ($data = mysqli_fetch_object($result)):
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->added_time ?></td>
                                                    <td><?php echo $data->medicines ?></td>
                                                    <td><?php echo $data->quantity ?></td>
                                                    <td><?php echo $data->direction ?></td>   
                                                    <td>
                                                        <a href="#"><button class="btn fa fa-eye" title="view more"></button></a>
                                                        <a href="editmedication.php?id=<?php echo $data->med_det_id; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                        <a href="deletemedication_alltime.php?id=<?php echo $data->med_det_id; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>
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
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
include 'footer.php';
?>
