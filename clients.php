<?php
include("header.php");
?>
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Clients</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php
                        if(isset($_REQUEST['r'])) {
                        	echo $_REQUEST['r'];
                        	}else {
                        		echo "All Patients";
                        	}
                        ?>
                             
                             <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="register.php">Add New</a>
                                        </li>
                                          
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Body Type</th>
                                            <th>Added on</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $clients=$model->getAllClients();
                                    $count=count($clients);
                                    for($x=0;$x<$count;$x++) {
                                    	$id=$clients[$x]['id'];
                                    	$type=$model->getUserDisease($id)
                                    ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $clients[$x]['id']; ?></td>
                                            <td><?php echo $clients[$x]['name']; ?></td>
                                            <td><?php echo $clients[$x]['phone']; ?></td>
                                             <td><?php echo $type; ?></td>
                                            <td><?php echo $clients[$x]['created']; ?></td>
                                            <td class="center">
                                            <a href="deleteclient.php?id=<?php echo $id; ?>"><i class="fa fa-trash-o"></i></a>
                                            <a href="updateclient.php?id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                        <?php
                                        }
                                        ?>
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
