<?php
require ('dbconnect.php');
date_default_timezone_set('Asia/Kolkata');
session_start();
if ($_SESSION['admin']!=true) {
  echo '<div class="alert alert-danger" role="alert">
  Please login from a admin account to access this page! If you logedin from a incorrect accout, Please logout by clicking the logout btn here <a class="btn btn-primary" href="logout.php" role="button">logout</a>
  <div><small id="email" class="form-text text-muted">Please contact webmaster if you are a admin. </small>
</div><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
';
echo "Your Current login type is =>".$_SESSION['usertype'];

  exit;
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: user_login.php");
    exit;
}

$alert=false;
$reset = false;
$delete = false;
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `users_scl` WHERE `userid` = $sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $delete = true;
  }else {
    $alert=true;
  }
}
if(isset($_GET['reset'])){
  $sno2 = $_GET['reset'];
  $sql2 = "SELECT * FROM `users_scl` WHERE `userid` = $sno2";
  $result2 = mysqli_query($conn, $sql2);
  $row= mysqli_fetch_assoc($result2);
  $user= $row['email'];
  echo $user;
  if ($result2) {
    $hash=password_hash($user, PASSWORD_DEFAULT);
    $sql3 = "UPDATE `users_scl` SET `password` = '$hash' WHERE `users_scl`.`userid` = $sno2;";
    $result3 = mysqli_query($conn, $sql3);
    $row2= mysqli_fetch_assoc($result3);
    $user= $row['email'];
    if ($result3) {
      $reset = true;
    }else {
      $alert=true;
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title>User List Page</title>
  </head>
  <body>
    <?php
    include "navbaradmin.php";
    
    if ($alert) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Failed!</strong> Unknown error occourred!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
    }
    
    if($delete){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong>Deleted successfully...
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    
    if($reset){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Password set same as user email!
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    
    ?>
  <h3>Users List</h3>
      <div class="container my-4">
      <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Admission Number</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">DOB</th>
              <th scope="col">Class</th>
              <th scope="col">Section</th>
              <th scope="col">SignUP Time</th>
              <th scope="col">User Type</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $sql= "SELECT * FROM `users_scl`";
            $result= mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num>0) { 
              $no=1;
              while ($row= mysqli_fetch_assoc($result)) { 
              echo "<tr>
              <th scope='row'>". $no . "</th>
              <td>". $row['firstname'] . "</td>
              <td>". $row['lastname'] . "</td>
              <td>". $row['regdno'] . "</td>
              <td>". $row['email'] . "</td>
              <td>". $row['mobile'] . "</td>
              <td>". $row['dob'] . "</td>
              <td>". $row['class'] . "</td>
              <td>". $row['section'] . "</td>
              <td>". $row['signuptime'] . "</td>
              <td>". $row['usertype'] . "</td>
              <td><button class='reset btn btn-sm btn-primary' id=".$row['userid'].">Reset Password</button> <button class='delete btn btn-sm btn-primary my-3' id=".$row['userid'].">Delete</button></td>
              
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
              $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("delete");
            sno = event.srcElement.id;
            console.log("srlno=", sno);

            if (confirm("Are you sure? you want to delete this user!")) {
                console.log("yes");
                window.location = `userlist.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no delete");
            }
        })
    })
    reset = document.getElementsByClassName('reset');
    Array.from(reset).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("reset");
            sno = event.srcElement.id;
            console.log("srlno=", sno);

            if (confirm("Are you sure? you want to reset password!")) {
                console.log("yes");
                window.location = `userlist.php?reset=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no reset");
            }
        })
    })
    </script>
  </body>
  <?php include 'footer.php'; ?>
</html>