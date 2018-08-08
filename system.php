<?php
include("header.php");	
$system=$model->getSystem();
$name=$system[0]['name'];
$logo=$system[0]['logo'];
?>

    <div id="page-wrapper">
       
        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                   
                        <h3 class="panel-title">
                    <?php
                    if(isset($_REQUEST['r'])) {
                    	echo $_REQUEST['r'];
                    	}else {
                    		echo " Enter new User details";
                    		}
                    ?>
                       
                        
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="dosystem.php" method="post" enctype="multipart/form-data">
                            <fieldset>
      <div class="form-group">
      <input class="form-control" placeholder="System name" name="name" type="text" value="<?php echo $name; ?>" required="" autofocus>
      </div>
      <div class="form-group">
      <input type="file" name="logo" class="form-control">
      <input type="hidden" name="logo2" value="<?php echo $logo; ?>">
      <img src="<?php echo $logo ?>" height="80" width="80" alt="<?php echo $name; ?>">
      </div>
      
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Update Profile" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
