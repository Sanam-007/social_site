<?php 
    session_start();
    //authorization
    if(!$_SESSION['id']){
      session_destroy();
      header('Location: ../index.php');
    }
    else if($_SESSION['id'] && $_SESSION['user'] != 'admin'){
      session_destroy();
      header('Location:unauthorized.php');
    }
    $id= $_SESSION['id'];
     
     
        //db query
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Admin control panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/link.php' ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  </head>
  <body>
    <section id="container" class="">
      <?php include '../include/navbar.php' ?>
      <?php include '../include/sidebar.php' ?>
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Table-user</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Table-user</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-6">
                <table id="example" class="display" style="width:95%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date_Of_Birth</th>
                            <th>Location</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include '../include/connection.php'; 
                            $qry="SELECT * FROM `user` ";
                            $r=mysqli_query($con,$qry);
                            $i=1;
                            while($row=mysqli_fetch_array($r)){
                                ?>
                                <tr><td><?php echo $i++; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['contact number'] ?></td>
                                    <td><?php echo $row['dob'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['status'] ?></td>

                             
                                </tr>
                            <?php 
                            } 
                        ?>
                    </tbody>

                </table>
            </div>
            <div class="col-2"></div>
          </div>
        </section>
      </section>
    </section>
    <?php include '../include/script.php' ?>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
             $('#example').DataTable();
            $('#example').DataTable( {
                "paging":   true,
                "ordering": false,
                "info":     false
            } );
        } );
    </script>
  </body>
</html>