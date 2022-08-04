
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
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Lets meet </h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="service.php">Service</a></li>
                    
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            
        </div>
        <div class="content">

            <h1>Social  site Management System </h1>
                
            <button class="rg"><a href="signup.php">Registration</a></button>
            <div class="form">

                <form method="post">
                    
                
                    <h2>Login form</h2>
                    <input type="email" name="email" placeholder="Enter email" autocomplete="off">
                    <input type="password" name="password" placeholder="Enter password">
                    <button class="loginbtn" name="submit" type="submit">Login</button>
                    
                    <p class="link">Don't have an account?<br>
                    <a href="signup.php">Sign up</a>
                    </p>
                    
                    
                </form>
                

            </div>
        </div>
    </div>
       
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
                }
            ?>
            </form>
       </div>
    </div>
    
</body>
</html>