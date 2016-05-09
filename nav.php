<?php 
    //mysql_connect("localhost","root","") or die(mysql_error());
    //mysql_select_db("capstone") or die ("could not find db");
    $connection = mysqli_connect('localhost', 'root', '', 'capstone');
    //$p_id = $_SESSION['patient_id'];

    $pid='';
    $pcardno='';
    $fname='';
    $pemail='';
    $pphone='';
    $insProv='';
    $count ='';
    if(isset($_POST['search_submit'])){
        if(isset($_POST['search'])){ 
        $search = $_POST['search'];            
        //echo $search;
            //mysqli_query($connection, 'CREATE TEMPORARY TABLE `table`');

            $query = mysqli_query($connection, "SELECT * FROM patients WHERE patientno LIKE $search" ) or die("could not search");
            $count = mysqli_num_rows($query);          
            if($count == 0){
                $output = 'There was no search results !';
            }
            else{
                while($rows = mysqli_fetch_array($query)){ 
                        $id = $rows['patient_id'];  
                        $patientno = $rows['patientno'];      
                        $firstName = $rows['firstName'];
                        $middleName = $rows['middleName'];
                        $lastName = $rows['lastName'];
                        $emergencyName =$rows['emergencyName'];
                        $emergencyPhone =$rows['emergencyPhone'];
                        $emergencyRelation =$rows['emergencyRelation'];
                        $blood_group = $rows['blood_group'];
                        $race = $rows['race'];
                        $gender = $rows['gender'];
                        $dob = $rows['dob'];
                        $marital_status = $rows['marital_status'];
                        $address = $rows['address'];
                        $home_phone = $rows['home_phone'];
                        $work_phone = $rows['work_phone'];        
                        $email = $rows['email'];
                        $insuranceProvider =$rows['insuranceProvider'];
                        $insuranceType = $rows['insuranceType'];
                        $insuranceCardNo =$rows['insuranceCardNo'];
                        $insurancePhone =$rows['insurancePhone'];   
                        
                        $_SESSION['patient_id'] = $rows['patient_id'];                        
                        $pid .= $id; 
                        $pcardno .= $patientno;
                        $fname .= $firstName .' '. $lastName;
                        $pemail .= $email;
                        $pphone .= $home_phone;                
                        $insProv .= $insuranceProvider;                              
                }             
            }
        }
        else {
            echo  "<p>Please enter a search query</p>"; 
        }
    }
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Smart Healthcare v7.0</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <a href="doctorslist.php" class="btn btn-primary btn-xs">Doctors List</a>
        <a href="addnewpatient.php" class="btn btn-primary btn-xs">Add New Patient</a>
        <!-- /.dropdown -->       
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>-->
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                     <form class="form-horizontal group-border-dashed" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
                        <div class="input-group custom-search-form">                       
                                <input type="text" name="search" class="form-control" placeholder="Scan Healthcare Card...">                            
                                <span class="input-group-btn">
                                    <button  class="btn btn-default" name="search_submit" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>                             
                        </div>
                     </form>
                    <!-- /input-group -->
                </li>                
                <li> <a href="index.php" class="btn btn-danger">Close Patient File</a> </li>                
                <li> <a href="patientdetails.php"><i class="fa fa-dashboard fa-fw"></i> Patient Details</a> </li>               
                <li> <a href="hospitalvisit.php"><i class="fa fa-ambulance fa-fw"></i> Hospital Visits</a> </li>
                <li> <a href="medications.php"><i class="fa fa-medkit fa-fw"></i> Medications</a> </li>
                <li> <a href="medicaltestsreports.php"><i class="fa fa-paste fa-fw"></i> Medical Tests & Reports</a> </li>
                <li> <a href="#"><i class="fa fa-hospital-o fa-fw"></i> Hospital <span class="label label-info"><?php echo $user->getHospitalNamefromUsers($_SESSION['id']); ?></span></a> </li>                                
               
            </ul>                                  
            </ul>          
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>