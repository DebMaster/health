<?php
include("header.php");
$id=$_REQUEST['id'];
$advice=$model->getAdvice($id);
$type=$advice[0]['type'];
$message=$advice[0]['message'];
?>
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Doctors Advice</h1>
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
                            Updating Advice
                        </div>
                        <div class="panel-body">
                                    <form role="form" action="updateadvice.php" method="post">
                                        <div class="form-group">
                                            <label>Diabetes Type</label>
                                            <select name="type" class="form-control">
                                            <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                            <option value="">--------------------------------------</option>
                                            <option value="Type 1">Type 1</option>
                                            <option value="Type 2">Type 2</option>
                                            </select>
                                            <p class="help-block">Example block-level help text here.</p>
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
