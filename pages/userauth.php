<?php

    
    define('DBINFO','mysql:host=localhost;dbname=scl_u');
    define('DBUSER','root');
    define('DBPASS','Sridh@do1');

    function performQuery($query){
        $con = new PDO(DBINFO,DBUSER,DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }

?>
<?php
include 'dbconnect.php';
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
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
      <title>User Authorization Page</title>
    </head>

    <body>
    <?php
    $type=$_SESSION['usertype'];
    
    switch ($type) {
      case 'admin':
        include "navbaradmin.php";
        break;
      case 'teacher':
        include "navbarteacher.php";
        break;
      
      default:
        # code...
        break;
    }
    ?>
      <h1>Welcome to User Authorization page!</h1>

     

      <main role="main">

<section class="jumbotron text-center">
  <div class="container">
      <?php
      
          $query = "select * from `requests`;";
          if(count(fetchAll($query))>0){
              foreach(fetchAll($query) as $row){
                  ?>
          
              <h1 class="jumbotron-heading"><?php echo $row['email'] ?></h1>
                <p class="lead text-muted"><?php echo $row['message'] ?></p>
                
                <p>
                  <a href="accept.php?id=<?php echo $row['userid'] ?>" class="btn btn-primary my-2">Accept</a>
                  <a href="reject.php?id=<?php echo $row['userid'] ?>" class="btn btn-secondary my-2">Reject</a>
                </p>
              <small><i><?php echo $row['signuptime'] ?></i></small>
      <?php
              }
          }else{
              echo "No Pending Requests.";
          }
      ?>
                
                    
             
          
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