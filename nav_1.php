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
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
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
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Scan Healthcare Card...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li> <a href="#" class="btn btn-primary btn-xs">Close Patient File</a> </li>
                <li> <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Patient Details</a> </li>               
                <li> <a href="hospitalvisit.php"><i class="fa fa-ambulance fa-fw"></i> Hospital Visits</a> </li>
                <li> <a href="medications.php"><i class="fa fa-medkit fa-fw"></i> Medications</a> </li>
                <li> <a href="medicaltestsreports.php"><i class="fa fa-paste fa-fw"></i> Medical Tests & Reports</a> </li>
                <li> <a href="#"><i class="fa fa-hospital-o fa-fw"></i> Hospital <span class="label label-info"><?php echo $user->getHospitalNamefromUsers($_SESSION['id']); ?></span></a> </li>                                
            </ul>          
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>