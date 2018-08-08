<?php
include("header.php");
?>
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Professional Advice</h1>
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
                            Add New Advice
                        </div>
                        <div class="panel-body">
                                    <form role="form" action="doadvice.php" method="post">
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="type" class="form-control">
                                            <option value="Underweight">Underweight</option>
                                            <option value="Normal">Normal</option>
											<option value="Overweight">Overweight</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Advice</label>
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
