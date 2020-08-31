<?php
date_default_timezone_set('Asia/Kolkata');
session_start();

// $exam = new Examination;
date_default_timezone_set('Asia/Kolkata');

include 'dbconnect.php';


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
    <title>Result Page</title>
  </head>
  <body>
  <?php include 'navbarpublic.php'; ?>

    <h2>Result Notice</h2>
    <a href="student_page.php">&#8592; Go back</a>
    <?php
    
    $class= $_GET['class'];
    $stream= $_GET['stream'];
    $section= $_GET['section'];
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  <?php include 'footer.php'; ?>
</html>