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
     $fname=$row['fname'];
     $lname=$row['lname'];

     $email=$row['email'];
    
     $contact=$row['contact'];
     $dob=$row['dob'];
     $location=$row['location'];
      $status=$row['status'];
      $image =$row['image'];

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
                <?php $src = "../uploadedimage/".$image;?>

                  <div style="padding-left:80px">
                          <img src  = "<?php echo $src;?>" width= "300px" height="300px">  
                  </div>
                   
                  <div class="panel-body">
                    <div class="padd">
                      <div class="form quick-post">
                
                        <form class="form-horizontal" method="post" action="UpdateProfile.php" enctype="multipart/form-data" >
                            <div class="form-group">
                               <div class="col-lg-5">
                                  <input type="file" name = "image" class="form-control"  >
                               </div>
                               <div class="col-lg-2">
                                  
                               </div>


                              <div class="col-lg-5">
                                  <button type="submit" name = "upload"  value="upload" class="btn btn-primary">Upload</button>
                               </div>

                            </div> 


                       </form>
                                
                    <?php
                        include '../connection.php';
                        if(isset($_POST['upload']))
                        {
                            
                            $ext= explode(".",$_FILES['image']['name']);
                            $c=count($ext);
                            $ext=$ext[$c-1];
                            $date=date("D:M:Y");
                            $time=date("h:i:s");
                            $image_name=md5($date.$time);
                            $image=$image_name.".".$ext;
                           
                          $query = "UPDATE `user` SET image = '$image'";
                           if(mysqli_query($con,$query))
                           {
                               echo "Successfully inserted!";
                               if($image !=null){
                                           move_uploaded_file($_FILES['image']['tmp_name'],"../uploadedimage/$image");
                                      }
                              
                           }
                         
                        }

                          
 


                      ?>
                                  
                              




                      </div>
                   </div>
                  </div>     

                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="name">First Name</label>
                          <div class="col-lg-10">
                            <input type="text" name = "fname" class="form-control" value="<?php echo $fname;?>" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="name">Last  Name</label>
                          <div class="col-lg-10">
                            <input type="text" name = "lname" class="form-control" value="<?php echo $lname;?>" >
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
                              $fname = $_POST['fname'];
                               $lname = $_POST['lname'];
                              $email = $_POST['email'];
                              
                              $contact = $_POST['contact'];
                              $dob = $_POST['dob'];
                              $location = $_POST['location'];
                              


                              //db query
                              $query = "UPDATE `user` SET id='$id', fname='$fname',lname='$lname', email='$email', `contact`= '$contact',dob='$dob' , location='$location'  WHERE id = $id";
                              if(mysqli_query($con,$query)){
                                 
                                  echo "<p style='color:green;'> profile successfully updated!<p>";
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
