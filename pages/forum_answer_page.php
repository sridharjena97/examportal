<!doctype html>
<html lang="en">
<?php
session_start();
include 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
  $qalert=false;
  $ealert=false;
if(isset($_POST['submit'])){
  if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=true ) {
    $answer = $_POST['answer'];
    $qid = $_POST['question_id'];
    
    $username=$_SESSION['username'];
    $sql= "INSERT INTO `forum_answers` (`answer_id`, `question_id`, `user_name`, `answer`, `time`) VALUES (NULL, '$qid', '$username', '$answer', current_timestamp())";
    $result= mysqli_query($conn,$sql);
    if ($result) {
        $qalert=true;
    }else {
        $ealert=true;
    }
  }
}

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <title>Forum Answers Page</title>
</head>
<?php include 'navbaruser.php' ?>
<!-- web area start here -->
<div class="container my-4">
<?php 
    if ($qalert) {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your answer added sussessfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if ($ealert) {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Error occurred!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
?>

<?php
$qid= $_GET['question'];
$sql= "SELECT * FROM `forum_questions` WHERE `question_id`='$qid'";
$result= mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $qtitle= $row['question_title'];
    $user = $row['user_name'];
    $qdesc= $row['question_details'];
    $time= $row['time'];
    // echo $cat;
echo'<body>
<div class="container my-3">
<div class=" bg-light jumbotron-fluid">
<div class="container">
    <h2 class="display-5 text-muted">Question:</h2>
  <h4 class="">'.$qtitle.'</h4>
  <p class="text-muted my-1">Description:</p>
  <p class="lead my-1">'.$qdesc.'</p>
 <small class="font-italic">'."posted "." by ".$user.'</small> 
</div>
</div>
</div>';
}
?>
<?php

  
  $qid= $_GET['question'];
  // $username=$_SESSION['username'];


echo '<div class="container my-4 bg-light py-3 px-3"><form method="post">

<input type="hidden" name="question_id" value="'.$qid.'"> 

<div class="form-group">
  <label for="answer">Submit an Answer:</label>
  <textarea class="form-control" name="answer" id="answer" rows="3" placeholder="Your Answer...." ></textarea>
</div>';
if(isset ($_SESSION['loggedin']) ){
  echo '<button name="submit" type="submit" class="btn btn-primary">Submit</button>
  </form></div>';
  }else {
      echo '<p class="display-4">Login to post a answer</p><a class="btn btn-outline-primary ml-1" href="user_login.php?requrl='.$_SERVER['REQUEST_URI'].'" role="button">Login</a>
      </form></div>';
  }
?>

<?php
$qid= $_GET['question'];
$sql= "SELECT * FROM `forum_answers` WHERE `question_id`='$qid'";
$result= mysqli_query($conn,$sql);
$row= mysqli_num_rows($result);

if ($row>0) {

    while ($row=mysqli_fetch_assoc($result)) {
        $answer= $row['answer'];
        $user = $row['user_name'];
        $time= $row['time'];
        
        echo '<div class="container border my-4 bg-light py-3 px-3"><div class="media">
        <img src="../images/user_default_image.jpg" width="80rem" class="mr-3" alt="...">
        <div class="media-body">
        <h6 class="mt-0">'.$user.'</h6>
        <p>'.$answer.'</p>
        <small class="text-muted">'."Answered on ".$time.'</small>
        </div>
        </div></div>';
    }
}else {
    echo '<div class="container"><div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="">No Answers Found</h3>
      <p class="lead">Be the first member to answer this question.</p>
    </div>
  </div></div>';
}
    

?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
</body>
<?php include 'footer.php'; ?>

</html>