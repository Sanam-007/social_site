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
     //echo $query;
     $table= mysqli_query($con,$query);
     $row=mysqli_fetch_array($table);
     $name=$row['name'];
     $email=$row['email'];
    
     $contact=$row['contact'];
     $dob=$row['dob'];
     $location=$row['location'];
      $status=$row['status'];
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
              <h3 class="page-header"><i class="fa fa-laptop"></i>user Update Profile</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Update Profile</li>

              </ol>
            </div>
          </div>
             <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Update Your information</div>
                  
                  <div class="clearfix"></div>
                </div>

                  <div style="padding-left:80px">
                          <img src="ws.jpg" width="300px" height="300px">
                  </div>
                   
                  <div class="panel-body">
                    <div class="padd">
                      <div class="form quick-post">
                
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                               <div class="col-lg-5">
                                  <input type="file" name = "img" class="form-control"  >
                               </div>
                               <div class="col-lg-2">
                                  
                               </div>


                              <div class="col-lg-5">
                                  <button type="submit" name = "submit" class="btn btn-primary">Upload</button>
                               </div>

                            </div> 


                       </form>
                      </div>
                   </div>
                  </div>     

                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="name">Name</label>
                          <div class="col-lg-10">
                            <input type="text" name = "name" class="form-control" value="<?php echo $name;?>" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="code">Email</label>
                          <div class="col-lg-10">
                              <input type="email" name = "email" class="form-control" value="<?php echo $email;?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Contact</label>
                          <div class="col-lg-10">
                              <input type="text" name = "contact" class="form-control" value="<?php echo $contact ;?>">
                          </div>
                        </div>
                         
                       
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Location</label>
                          <div class="col-lg-10">
                              <input type="text" name = "location" class="form-control" value="<?php echo $location;?>">
                          </div>
                        </div>
                       
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Date of birth</label>
                          <div class="col-lg-10">
                              <input type="date" name = "dob" class="form-control"value="<?php echo $dob;?>">
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
                              $name = $_POST['name'];
                              
                              $email = $_POST['email'];
                              
                              $contact = $_POST['contact'];
                              $dob = $_POST['dob'];
                              $location = $_POST['location'];
                              $status =$_POST['status'];
                              //db query
                              $query = "UPDATE `user` SET id='$id', name='$name', email='$email', `contact number`= '$contact' ,dob='$dob' , location='$location'  WHERE id = $id";
                              if(mysqli_query($con,$query)){
                                 
                                  echo "<p style='color:green;'> password successfully updated!<p>";
                                  //echo 'Succesfully Inserted';
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
