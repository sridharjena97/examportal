<?php
include'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
$exam_not_scheduled=true;
session_start();

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
    <title>Exam List</title>
  </head>
  <body>
  <?php include 'navbarpublic.php'; ?>
          <div class="container my-4">
    <h2 class=" my-4">Your Exams:</h2>
    <?php
    date_default_timezone_set('Asia/Kolkata');
    $class= $_GET['class'];
    $stream=$_GET['stream'];
    $sql= "SELECT * FROM `exam` WHERE `exam_for_class`= '$class' AND `exam_for_stream`='$stream'";
    $result= mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result);
   
    if ($num>0) {
      while ($row= mysqli_fetch_assoc($result)) {
        $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
        $exam_end_time = $row['exam_end_time'];
        if($exam_end_time > $current_datetime){
          $exam_not_scheduled=false;
          $id= $row['exam_id'];
          $time2= $row['exam_start_time'];
          $date2 = strtotime($time2); 
          $time1= $row['exam_end_time'];
          $date1 = strtotime($time1); 
        //   $diff= $date1-$date2-3600;
        $diff= round(abs($date1 - $date2) / 60,2). " minute";

          
          echo'<div class="container border my-4 bg-light py-3 px-3"><div class="media">
          
          <div class="media-body">
            <h5 class="mt-0">'.$row['exam_title'].'</h5>
            
            <p class="my-0">Exam Duration:'. $diff .'</p>
            <p class="my-0">Exam Start Time:'. $row['exam_start_time'] .'</p>
            <p class="my-0">Exam End Time:'. $row['exam_end_time'] .'</p>
          </div><span class="mt-4" ><a class="btn btn-primary" href="exampage.php?examid='.$id.'" role="button">Exam Link</a></span>
        </div></div>';
        } 
        
      }
    }
    

    
    ?>
    </div>
    <?php
    if($exam_not_scheduled){
      echo '<div class="container"><div class="jumbotron">
            <h1 class="display-4">No Exam Scheduled!</h1>
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