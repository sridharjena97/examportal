<?php
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
// $exam = new Examination;
date_default_timezone_set('Asia/Kolkata');
$salert=false;
$alert=false;
$timealert=false;
include 'dbconnect.php';
if(isset($_POST['submit'])){
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=true ) {
      $exam_title = $_POST['exam_title'];
      $exam_start = $_POST['examstart'];
      $exam_end = $_POST['examend'];
      $exam_link = $_POST['examlink'];
      $exam_link= str_replace("<","&lt;",$exam_link);
      $exam_link= str_replace(">","&gt;",$exam_link);
      $class = $_POST['class'];
      $stream = $_POST['stream'];
      $section = $_POST['section'];
      $username=$_SESSION['username'];
      if($exam_end > $exam_start){
        $sql= "INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_for_class`,`exam_for_stream`, `exam_for_section`, `exam_start_time`, `exam_end_time`, `exam_link`, `created_by`, `time_added`) VALUES (NULL, '$exam_title', '$class','$stream', '$section', '$exam_start', '$exam_end', '$exam_link', '$username', current_timestamp())";
        $result= mysqli_query($conn,$sql);
        if ($result) {
            $salert=true;
        }else {
            $alert=true;
        }
      }else {
        $timealert=true;
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
    <title>Exam Setup Page</title>
  </head>
  <body>
    <?php include'navbarteacher.php'; ?>
    <?php
    if ($alert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Exam Creation Failed!</strong> Unexpected error !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if ($salert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exam Scheduled!</strong> Please check scheduled exam page !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if ($timealert) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Please check Your Input!</strong> exam end time should be grater than start time !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    
    ?>
    <h2>Exam setup page</h2>
    <!-- form starts here  -->
    <div class="container">
    <form method="post">
  <div class="form-group">
    <label for="exam_title">Exam Title</label>
    <input type="text" name="exam_title" class="form-control" id="exam_title" placeholder="Put your exam title here" required>
  </div>
  <div class="form-group">
    <label for="examstart">Exam Starts At:</label>
    <input type="datetime-local" class="form-control" name="examstart" id="examstart" required>
  </div>
  <div class="form-group">
    <label for="examend">Exam Ends At:</label>
    <input type="datetime-local" class="form-control" name="examend" id="examend" required>
  </div>
  <div class="form-group">
    <label for="examlink">Exam Link:</label>
    <input type="text" class="form-control" name="examlink" id="examlink" placeholder="paste embeding link here" required>
  </div>
  <div class="input-group mb-3 ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Exam Scheduled for Class*</label>
  </div>
  <select class="custom-select" name="class" id="class" required>
    <option value="">None</option>
    <option value="10">Class-X</option>
    <option value="11">Class-XI</option>
    <option value="12">Class-XII</option>
  </select>
</div>
  <div class="input-group mb-3 ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Select Stream*</label>
  </div>
  <select class="custom-select" name="stream" id="stream" required>
    <option value="">None</option>
    <option value="NA">NA</option>
    <option value="science">Science</option>
    <option value="commerce">Commerce</option>
  </select>
</div>
  <div class="input-group mb-3 ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Select Section*</label>
  </div>
  <select required class="custom-select" name="section" id="section" >
    <option value="">None</option>
    <option value="A">Section-A</option>
    <option value="B">Section-B</option>
    <option value="C">Section-C</option>
    <option value="D">Section-D</option>
    <option value="E">Section-E</option>
  </select>
</div>
<button name="submit" type="submit" class="btn btn-primary">Create Exam</button>
  <button type="reset" class="btn btn-primary">Reset</button>
</form>
</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  <?php include 'footer.php'; ?>
</html>