<?php
include'dbconnect.php';
session_start();



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Exam Page</title>
  </head>
  <style>
    iframe{
      width: 100vw !important;
      height: 100vh !important;
    }

  </style>
  <body>
      <?php
      date_default_timezone_set('Asia/Kolkata');
      $id= $_GET['examid'];
      $sql= "SELECT * FROM `exam` WHERE `exam_id`=$id";
        $result= mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        
        $row=mysqli_fetch_assoc($result);
        $exam_link= $row['exam_link'];
        $exam_link= str_replace("&lt;","<",$exam_link);
        $exam_link= str_replace("&gt;",">",$exam_link);
        $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
        $exam_start_time = $row['exam_start_time'];
        $exam_end_time = $row['exam_end_time'];
        
       include 'navbarpublic.php';
        if($current_datetime > $exam_start_time && $exam_end_time > $current_datetime){
          echo '<nav class="navbar navbar-light bg-light sticky-top">
          <div class="mx-auto order-0">
        <span class="navbar-brand" href="#">Form Timer: </span><span class="text-center" id="demo"></span>
        
        </button>
    </div>
         
        </nav>';
          echo $exam_link;
         
        }else {
            echo '<div class="container"><div class="jumbotron">
            <h1 class="display-4">Exam Not Started!</h1>
            <p class="lead">Possible Reasons:</p>
            <ul>1. You came here before the exam starts</ul>
            <ul>2. You came with an invalid link</ul>
            <ul>3. Exam Expired</ul>
            <ul>4. You have old cash. Please clear your cash and try again.</ul>
            <hr class="my-4">
            <p>Refresh the page by clicking link below!!!</p>
            <input type="button" value = "Refresh" onclick="history.go(0)" />
          </div></div>';
        }

      
      
      ?>

    <!-- Optional JavaScript -->
    <script>
          // Set the date we're counting down to
          // 1. JavaScript
          // var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
          // 2. PHP
          var countDownDate = <?php $id= $_GET['examid'];  date_default_timezone_set('Asia/Kolkata');
            
            $sql= "SELECT * FROM `exam` WHERE `exam_id`=$id";
              $result= mysqli_query($conn,$sql);
              $num=mysqli_num_rows($result);
              $row=mysqli_fetch_assoc($result);
              $time1= $row['exam_end_time'];
               echo strtotime($time1) ?> * 1000;
          var now = <?php echo time() ?> * 1000;
      
          // Update the count down every 1 second
          var x = setInterval(function() {
      
              // Get todays date and time
              // 1. JavaScript
              // var now = new Date().getTime();
              // 2. PHP
              now = now + 1000;
      
              // Find the distance between now an the count down date
              var distance = countDownDate - now;
      
              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
              // Output the result in an element with id="demo"
              document.getElementById("demo").innerHTML =  " " + hours + "h " +
                  minutes + "m " + seconds + "s ";
      
              // If the count down is over, write some text 
              if (distance < 0) {
                  clearInterval(x);
                  document.getElementById("demo").innerHTML = "EXPIRED";
                  document.getElementById("demo").style.backgroundColor = "red";
              }
          }, 1000);
          </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  <?php include 'footer.php'; ?>

</html>