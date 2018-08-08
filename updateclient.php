<?php
include("header.php");
$id=$_REQUEST['id'];
$user=$model->getClient($id);
$id=$user[0]['id'];
$name=$user[0]['name'];
$phone=$user[0]['phone'];
$type=$model->getUserDisease($id);
$password=$user[0]['password'];
?>

    <div id="page-wrapper">
       
        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Update user details.</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="clientupdate.php" method="post">
                            <fieldset>
      <div class="form-group">
      <input class="form-control" placeholder="Full name" name="name" type="text" required="" value="<?php echo $name; ?>" autofocus>
      </div>
      <div class="form-group">
      <select name="type" class="form-control">
      <option value="">----------Body Type-------</option>
      <option selected="selected" value="<?php echo $type; ?>"><?php echo $type; ?></option> 
      <option value="">-----------------------------</option>   
       <option value="Underweight">Underweight</option>
                                            <option value="Normal">Normal</option>
											<option value="Overweight">Overweight</option>
      </select>
      </div>
      <div class="form-group">
      <input class="form-control" placeholder="Phone number" value="<?php echo $phone; ?>" name="phone" type="text" required="">
      </div>
      <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input class="form-control" value="<?php echo $password; ?>" placeholder="Password" name="password" type="password" required="" value="">
      </div>
      
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Update User" />
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
