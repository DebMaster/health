<?php
include("header.php");
?>
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Food Plans</h1>
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
                            Add New Food Plan
                        </div>
                        <div class="panel-body">
                                    <form role="form" action="domeal.php" method="post">
                                        <div class="form-group">
                                            <label>Basal Metabolic Rate</label>
                                            <select name="bmr" class="form-control">
                                            <option value="Low BMR">Low BMR</option>
                                            <option value="High BMR">High BMR</option>											
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Body Mass Index</label>
                                            <select name="bmi" class="form-control">
                                            <option value="Low">Low</option>
											<option value="Normal">Normal</option>
                                            <option value="High">High</option>											
                                            </select>
                                        </div>
										
										<div class="form-group">
                                            <label>Day</label>
                                            <select name="day" class="form-control">
                                            <option value="1">Sunday</option>
											<option value="2">Monday</option>
                                            <option value="3">Tuesday</option>
											<option value="4">Wednesday</option>
											<option value="5">Thursday</option>
											<option value="6">Friday</option>
											<option value="7">Saturday</option>											
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Weight Range</label>
                                            <select name="weight" class="form-control">                                            
											<?php
											for($x=5;$x<=25;$x++){											
											?>
											<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                            <?php
											}
											?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Time</label>
                                            <select name="time" class="form-control">
                                            <option value="Morning">Morning</option>
											<option value="Afternoon">Afternoon</option>
											<option value="Evening">Evening</option>																						
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Meal Plan</label>
                                            <textarea class="form-control" name="advice"></textarea>                                           
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
