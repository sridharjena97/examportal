<?php
include'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');

session_start();
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
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <title>Hello, <?php echo $_SESSION['username'];?></title>
  </head>
  <body>
    <?php include'navbaruser.php'; ?>
    <h2>Your Exams</h2>
    <?php
    date_default_timezone_set('Asia/Kolkata');
    $email=$_SESSION['email'];
    $sql= "SELECT * FROM `users_scl` WHERE `email`='$email'";
    $result= mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $class= $row['class'];
    $section= $row['section'];
    $stream= $row['stream'];
    $sql= "SELECT * FROM `result` WHERE `class`= '$class' AND `stream`='$stream' AND `section`='$section'";
            $result= mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num>0) { 
              
              while ($row= mysqli_fetch_assoc($result)) {

                echo '<div class="container border my-4 bg-light py-3 px-3"><div class="media">
                <img src="../images/notice.png" width="40rem" class="mr-3" alt="...">
                <div class="media-body">
                <h5 class="mt-0">'.$row['notice_description'].'</h5>
                
                <small class="text-muted">'."posted on ".$row['time'].'</small>
                </div><span class="mt-1"><a class="btn btn-primary" href="'.$row['link'].'" role="button">view</a></span>
                </div></div>';
              
              }
            }else {
              echo '<div class="container"><div class="jumbotron">
            <h1 class="display-4">Nothing Here!</h1>
            <p class="lead">Have a Nice Day</p>
            
            <hr class="my-4">
            <p>Refresh the page by clicking link below!!!</p>
            <input type="button" value = "Refresh" onclick="history.go(0)" />
          </div></div>';
            }
           

    
    ?>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <?php include 'footer.php'; ?>
</html>