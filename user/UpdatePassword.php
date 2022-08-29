<?php 
    session_start();
    //authorization
    if(!$_SESSION['id']){
      session_destroy();
      header('Location: ../index.php');
    }
    else if($_SESSION['id'] && $_SESSION['user'] != 'user'){
      session_destroy();
       header('Location: unauthorized.php');
    }
    $id= $_SESSION['id'];
     include '../connection.php';
     $query ="SELECT * FROM user WHERE id=$id ";
     
     $table= mysqli_query($con,$query);
     $row=mysqli_fetch_array($table);
     
     $password=$row['password'];
     
        //db query
?>



<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>user control panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/link.php' ?>
  </head>
  <body>
    <section id="container" class="">
      <?php include '../include/user_navbar.php' ?>
      <?php include '../include/user_sidebar.php' ?>
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>user Update Password</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Update Password</li>

              </ol>
            </div>
          </div>
             <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Update Your Password</div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post" action="">
                        
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Old Password</label>
                          <div class="col-lg-10">
                              <input type="password" name = "password1" class="form-control" >
                          </div>
                        </div>
                          
                          <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">New Password</label>
                          <div class="col-lg-10">
                              <input type="password" name = "password2" class="form-control" >
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Re-Type Password</label>
                          <div class="col-lg-10">
                              <input type="password" name = "password3" class="form-control" >
                          </div>
                        </div>
                                     
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                              <button type="submit" name = "submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                      </form>
                      <?php 
                        include '../connection.php';
                        if(isset($_POST['submit']))
                        {
                            //recvd data from input/control
                            
                            $password1 = $_POST['password1'];
                            $password2 = $_POST['password2'];
                            $password3 = $_POST['password3'];

                            if($password != $password1){
                              echo "<p style='color:red;'> old password doesn't match!<p>";
                            }
                            else if($password2 != $password3){
                               echo "<p style='color:red;'> new password doesn't match!<p>";
                            }
                            //db query
                            else{
                              $query = "UPDATE `user` SET  password='$password3'  WHERE id = $id";
                              if(mysqli_query($con,$query)){
                                 
                                 
                                  echo "<p style='color:green;'> password successfully updated!<p>";
                              }
                            }
                            

                        }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
    <?php include '../include/script.php' ?>
  </body>
</html>

