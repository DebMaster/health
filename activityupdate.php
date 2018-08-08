<?php
include("header.php");
$id=$_REQUEST['id'];
$advice=$model->getActivity($id);
$type=$advice[0]['type'];
$message=$advice[0]['advice'];
$time=$advice[0]['time'];
$day=$advice[0]['day'];
?>
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Daily Activities</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
            <div class="col-lg-2">
            </div>
                <div class="col-lg-8">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Updating Activity
                        </div>
                        <div class="panel-body">
                                    <form role="form" action="updateactivity.php" method="post">
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="type" class="form-control">
                                            <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                            <option value="">--------------------------------------</option>
                                            <option value="Type 1">Type 1</option>
                                            <option value="Type 2">Type 2</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Day</label>
                                            <select name="day" class="form-control">											
                                            <option selected="selected" value="<?php echo $day; ?>"><?php echo $model->dayFromInteger($day); ?></option>
                                            <option value="">-------------------------------------------</option>
											<option value="0">Monday</option>
                                            <option value="1">Tuesday</option>
											<option value="2">Wednesday</option>
											<option value="3">Thursday</option>
											<option value="4">Friday</option>
											<option value="5">Saturday</option>
											<option value="6">Sunday</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Time</label>
                                            <select name="time" class="form-control">
											<option selected="selected" value="<?php echo $time; ?>"><?php echo $time; ?></option>
											<option value="">-------------------------------------------</option>
											<?php
											for($x=0;$x<=23;$x++){
											$t="00:00";
											if($x <= 9){
											$t="0".$x.":00";
											}else{
												$t=$x.":00";
											}
											?>
											<option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                            <?php
											}
											?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Advice</label>
                                            <textarea class="form-control" name="advice"><?php echo $message; ?></textarea>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                           
                                        </div>
                                           
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-success">Reset</button>
                                    </form>
                                </div>
                       
                    </div>
                </div>
                 <div class="col-lg-2">
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

</body>

</html>
