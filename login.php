 <?php
    session_start();
      $_SESSION['isloggedin']='no';
                   
                           
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Lets meet page</title>
                <link rel="stylesheet" href="login.css">

           <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->

            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <!-- Include the above in your HEAD tag -->

            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


            </head>
            <body>
          
            <div class="main">
                
                
                <div class="container">
            <center>
            <div class="middle">
                  <div id="login">

                    <form action="" method="post">

                      <fieldset class="clearfix">

                        <p ><span class="fa fa-user"></span><input type="text" name="email"  Placeholder="Email Address" required ></p> 
                        <p><span class="fa fa-lock"></span><input type="password"   name="password" Placeholder="Password" required></p> 
                        
                         <div >
                      <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
                         password?</a></span>
                          <p class="link">Don't have an account?<br>

                            <a href="signup.php">Sign up</a>
                          


                     <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" name="submit"  value="log in"></span>
                                        </div>

                      </fieldset>
                 <div class="clearfix"></div>
                    </form>
                    <?php
           
                   if(isset($_POST['submit'])){
                  
                  include 'connection.php';
                  $email = $_POST['email'];
                  $password = $_POST['password'];
                  
                
                 $query ="SELECT * FROM `user` WHERE email='$email' AND password ='$password'";
                 $table= mysqli_query($con,$query);
                 $row=mysqli_fetch_array($table);
               
                 if($row){

                   $_SESSION['isloggedin']= "yes";
                   $_SESSION['user']='user';
                  
                   $_SESSION['id']=$row['id'];
                  header('Location: user/dashboard.php');
                    
                   }
                  
                 
                 
                   
                     else{
                       $query ="SELECT *FROM admin WHERE email='$email' AND password ='$password'";
                       $table= mysqli_query($con,$query);
                       $row=mysqli_fetch_array($table);
                      
                   if($row){
                         $_SESSION['isloggedin']= "yes";
                         $_SESSION['user']='admin';
                        $_SESSION['id']=$row['id'];
                        header('Location: admin/dashboard.php');
                       }
                       else{
                         echo "<p style='color:red;'> password doesn't match!<p>";    
                       }
                     }
                  }
                
            ?>

                    <div class="clearfix"></div>

                  </div> <!-- end login -->
                  <div class="logo">LOGO
                      
                      <div class="clearfix"></div>
                  </div>
                  
                  </div>
            </center>
                </div>

            </div>

            </body>
            </html>