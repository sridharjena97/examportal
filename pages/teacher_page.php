<?php
include 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
session_start();
if ($_SESSION['teacher']!=true) {
  echo '<div class="alert alert-danger" role="alert">
  Please login from a teachers account to access this page! If you logedin from a incorrect accout, Please logout by clicking the logout btn here <a class="btn btn-primary" href="logout.php" role="button">logout</a>
  <div><small id="email" class="form-text text-muted">Please contact webmaster if you are a teacher. </small>
</div><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
';
echo "Your Current login type is =>".$_SESSION['usertype'];

  exit;
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: user_login.php");
    exit;
}


?>
<!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <title>Welcome <?php echo $_SESSION['username']?></title>
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <style>
          body::before{
            background: url('../images/teacherpagebg.jpg') no-repeat center center/cover;
            content: "";
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.5;
          }
          #clock {
        position: absolute;
        top: 14%;
        right: 1%;
       
      }
      @media only screen and (max-width: 480px) {
        #clock {
       display: none;
        }
      }
      </style>
    </head>
    <body>
      
      <?php include "navbarteacher.php"?>
      <div id="clock">
      <?php require 'clock.php'?>
      </div>
      <h3>Notice Board</h3>
      <div class="container my-4">
      <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Notice Title</th>
              <th scope="col">Description</th>
              <th scope="col">Date and Time Added</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $sql= "SELECT * FROM `notes`";
            $result= mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num>0) { 
              $no=1;
              while ($row= mysqli_fetch_assoc($result)) { 
              echo "<tr>
              <th scope='row'>". $no . "</th>
              <td>". $row['title'] . "</td>
              <td>". $row['description'] . "</td>
              <td>". $row['time'] . "</td>
              
            </tr>";
             $no=$no+1;
             }
             }
             
             ?>

             
            </tbody>
        </table>
      </div>
    </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script>
              $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    </body>
    <?php include 'footer.php'; ?>
  </html>