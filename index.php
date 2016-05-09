<?php
session_start();
include 'header.php';
//Check user logined in if not redirect login page
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
header("Location: login.php");
} else {
?>
<?php include 'head.php'; ?>
<body>
<div id="wrapper">
<!-- Navigation -->
<?php include 'nav.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <?php
        if($count > 0){ ?>
        <div class="col-lg-12">
            <h1 class="page-header">Patient Details</h1>
        </div>			
        <div class="panel panel-default">                        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                           
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Patient Card NO</th>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Phone</th>
                                        <th>Insurance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                                   
                                        <tr>                                                                                        
                                            <td> <?php print($pid);?> </td>
                                            <td> <?php print($pcardno);?> </td>
                                            <td> <?php print($fname);?></td>
                                            <td> <?php print($pemail);?></td>
                                            <td> <?php print($pphone);?></td>
                                            <td> <?php print($insProv);?></td>
                                            <td>
                                                <a href="patient_details.php?id=<?php echo $pid; ?>"><button class="btn fa fa-eye" title="view more"></button></a>
                                                <a href="editpatient.php?id=<?php echo $pid; ?>"><button class="btn fa fa-edit" title="edit"></button></a>
                                                <a href="deletepatient.php?id=<?php echo $pid; ?>"><button class="btn fa fa-trash-o" title="delete"></button></a>    
                                            </td>
                                        </tr>                                        
                                </tbody>
                            </table>
                            <?php }
                            else{
                                echo '<h1>Welcome to Smart Healthcare </h1>';
                                echo '<img src="images/medical_sample.jpg" style="margin-top:50px;; width:100%; height:100%;"></img>';
                            }?>                            
                        </div><!--/table-responsive-->
                    </div><!--/porlets-content-->
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
<?php
include 'footer.php';
}
?>
