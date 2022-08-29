<?php
    session_start();
      $_SESSION['isloggedin']='no';
                   
                           
            ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>From Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid bg-dark text-light py-3">
       <header class="text-center">
           <h1 class="display-6">welcome to our page</h1>
       </header>
    </div>
    <section class="container my-2 bg-dark w-50 text-light p-2">
      <form class="row g-3 p-3">
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">First name</label>
          <input type="text" name="fname"  class="form-control" id="validationCustom01" value="Mark" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Last name</label>
          <input type="text"  name="lname" class="form-control" id="validationCustom02" value="Otto" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email"  name="email1" class="form-control" id="inputEmail4">
        </div>
        
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password"  name="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
          <label for="inputDate4" class="form-label">Birth Date</label>
          <input type="date"   name="dob" class="form-control" id="inputDate4">
        </div>
       
       
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>

      <?php
           
           if(isset($_POST['submit'])){
         
          include 'connection.php';
          $fname=$_POST['fname'];
          $lname=$_POST'[lname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $dob=$_POST['dob'];
         
          $query ="SELECT *FROM admin WHERE fname='$fname' ,lname='$lname' , email='$email' , password ='$password', dob='$dob'";
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
               $query ="SELECT *FROM admin WHERE  email='$email' AND password ='$password'";
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




















    </section>
   
  </body>
</html>