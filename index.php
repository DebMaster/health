<?php
include("header.php");
$admins=$model->getAllAdmins();
$users=$model->getAllClients();
$advice=$model->getAllAdvice();

$cadmin=count($admins);
$cusers=count($users);
$cadvice=count($advice);
?>
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome <b><?php echo $_SESSION['name']; ?> </b>
                   </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
                <!--quick info section -->
                <div class="col-lg-4">
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-user-md fa-3x"></i>&nbsp;<b><?php echo $cadmin; ?> </b>Registered professionals
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="alert alert-success text-center">
                        <i class="fa  fa-wheelchair fa-3x"></i>&nbsp;<b><?php echo $cusers; ?> </b>Registered clients
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-pencil fa-3x"></i>&nbsp;<b><?php echo $cadvice; ?></b> Advices

                    </div>
                </div>
                
                <!--end quick info section -->
            </div>

          

            </div>

               
            </div>


         


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
