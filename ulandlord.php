<?php
include("header.php");
if(!isset($_REQUEST['uid'])) {
header("Location: landlords.php");	
}
$uid=$_REQUEST['uid'];
$landlord=$model->getLandlord($uid);
?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Landlords</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php
                           echo $landlord[0]['name'];
                           ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="lupdate.php" method="post">
                                        <div class="form-group">
                                         <label>Full name</label>
                        <input type="text" name="name" class="form-control" value="<?php  echo $landlord[0]['name']; ?>">
                                           
                                        </div>

 <div class="form-group">
                                         <label>Phone Number</label>
                                         <input type="text" name="phone" class="form-control" value="<?php  echo $landlord[0]['phone']; ?>">
                                           
                                        </div>      
                                        
                                               <div class="form-group">
                                         <label>Email</label>
                                         <input type="email" name="email" class="form-control" value="<?php  echo $landlord[0]['email']; ?>">
                                         <input type="hidden" name="id" value="<?php echo $uid ?>">  
                                        </div>                            
                                        
                                        
                                       
                                        
                                        <div class="form-group">
                                            <label>Full Address</label>
                                            <textarea name="address" class="form-control" rows="3">
                                            <?php  echo $landlord[0]['address']; ?>
                                            </textarea>
                                        </div>
                                        
 <div class="form-group">
                                         <label>Password</label>
                                         <input type="password" name="password" value="<?php echo $landlord[0]['password']; ?>" class="form-control">
                                           
                                        </div>                                          
                                           
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-success">Reset</button>
                                    </form>
                                </div>
         
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
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
