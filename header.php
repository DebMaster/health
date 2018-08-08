<?php
$name="Weight Management Application";
$logo="";
include("model.php");
$model=new model;
$system=$model->getSystem();
$count=count($system);
for($x=0;$x<$count;$x++) {
	$name=$system[$x]['name'];
	$logo=$system[$x]['logo'];
}	
$notifications=$model->getNotifications();
if($_SESSION["name"] == ""){
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="<?php echo $logo; ?>" height="80" width="80" alt="<?php echo $name; ?>" />
                    <?php 
                    echo "<h4 style='color:#fff;'>".$name."</h4>";
                    ?>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning"><?php 
                        echo count($notifications);
                        ?></span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                      <?php
                      $ncount=count($notifications);
                      for($x=0;$x<$ncount;$x++) {
                      ?>  
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i><?php
                                    echo $notifications[$x]['message'];
                                     ?>
                                    <span class="pull-right text-muted small"><?php 
                                   // echo $model->get_timeago(strtotime($notifications[$x]['created']));
                                 echo $model->dateFormater($notifications[$x]['created']);   
                                    ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
            <?php
            }
            ?>
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                       <!-- <li><a href="profile.php"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>-->
                        <li><a href="system.php"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $_SESSION['name']; ?> </div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="advice.php"><i class="fa fa-question fa-fw"></i> Advice</a>
                    </li>
					 <li>
                        <a href="meals.php"><i class="fa fa-cutlery fa-fw"></i> Food Plans</a>
                    </li>
					<li>
                        <a href="activities.php"><i class="fa fa-calendar fa-fw"></i>Activities</a>
                    </li>
                     <li>
                        <a href="users.php"><i class="fa fa-users fa-fw"></i>Users</a>
                    </li>
					
                     <li>
                        <a href="clients.php"><i class="fa fa-users fa-fw"></i>Patients</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->