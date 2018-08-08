<?php
include("header.php");
?>
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Meal Plans</h1>
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
                        		echo "All Plans";
                        	}
                        ?>
                             
                             <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="newfood.php">Add New</a>
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
                                            <th>BMR</th>
											<th>BMI</th>
											<th>Category Weight</th>
											<th>Day</th>
											<th>Time</th>
                                            <th>Message</th>
                                            <th>Added on</th>                
                                           	<th>Action</th>						
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $advice=$model->getAllMealPlans();
                                    $count=count($advice);
                                    for($x=0;$x<$count;$x++) {
                                    	$id=$advice[$x]['id'];
										$t="00:00";											
											if($advice[$x]['time'] <= 9){
											$t="0".$advice[$x]['time'].":00";										
											}else{
												$t=$advice[$x]['time'].":00";
											}
											$delete="mdelete.php?id=".$advice[$x]['id'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $advice[$x]['id']; ?></td>
                                            <td><?php echo $advice[$x]['bmr']; ?></td>
											<td><?php echo $advice[$x]['bmi']; ?></td>
											<td><?php echo $advice[$x]['weight']; ?></td>
											<td><?php echo $model->dayFromInteger($advice[$x]['day']); ?></td>
											<td><?php echo $advice[$x]['time']; ?></td>
                                            <td><?php echo $advice[$x]['message']; ?></td>
                                            <td><?php echo $advice[$x]['created']; ?></td> 
                                            <th><a href="<?php echo $delete; ?>" class="btn btn-danger">Delete</a></th>											
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
