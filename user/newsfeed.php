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
              <h3 class="page-header"><i class="fa fa-laptop"></i>user newsfeed</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>newsfeed</li>

              </ol>
            </div>
          </div>
             <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left"><a href ="updatepassword.php"><?php echo "sanam" ?></a></div>
                  
                  <div class="clearfix"></div>
                </div>
                <div>
                
                <p>
                    User have posted new post
                </p>
               </div>

                  <div style="padding-left:80px">
                          <img src="ws.jpg" width="300px" height="300px">
                  </div>
                   
                  

                

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

