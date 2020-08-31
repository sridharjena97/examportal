<!doctype html>
<html lang="en">
<?php
session_start();
include 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
  $qalert=false;
  $ealert=false;
if(isset($_POST['submit'])){
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=true ){

    $new_question_title = $_POST['qtitle'];
    $new_question_description = $_POST['qdescription'];
    $cat = $_POST['cat'];
    $username=$_SESSION['username'];
    $sql= "INSERT INTO `forum_questions` (`question_category`, `question_id`, `question_title`, `question_details`, `user_name`, `time`) VALUES ('$cat', NULL, '$new_question_title', '$new_question_description', '$username', current_timestamp())";
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
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Forum Questions Page</title>
</head>
<style>
    @media only screen and (max-width: 600px) {
        #desc{
            display: none;
        }
        #search{
            width: 40vw;
        }
        #userimage{
            display: none;
        }
}
   
</style>

<body>

    <?php include 'navbaruser.php' ?>
    <?php echo '<a href="forum.php">&#8592; Go back</a>' ?>
   
    <?php 
    if ($qalert) {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your question added sussessfully.
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
$id= $_GET['catid'];
$sql= "SELECT * FROM `forum_categories` WHERE `forum_cat_srl`=$id";
$result= mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    
    $title= $row['title'];
    $desc= $row['description'];
    $cat= $row['category'];
    // echo $cat;
    echo'
<div class="container my-4 bg-secondary py-3 px-3">
    <div class="media">
        <img src="../images/'.$cat.".png".'" class="align-self-center mr-3" style="
        width: 14rem; alt="...">
        <div id="desc" class="media-body align-self-center ">
            <h5 class="mt-0 text-white"><u>'.$title.'</u></h5>
            <p class="text-white" >'.$desc.'</p>
           
        </div>
    </div>
</div>';
}
?>
    <!-- form start here -->
    <?php
$id= $_GET['catid'];
$sql= "SELECT * FROM `forum_categories` WHERE `forum_cat_srl`=$id";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cat= $row['category'];
echo '<div class="container my-4 bg-light py-3 px-3"><form method="post">
<div class="form-group">
  <label for="qtitle">Question Title:</label>
  
  <input type="text" name="qtitle" class="form-control" id="qtitle" placeholder="Keep your titile as small and crisp as possible">
</div>
<input type="hidden" name="cat" value="'.$cat.'"> 
<div class="form-group">
  <label for="qdescription">Tell us more about the question:</label>
  <textarea class="form-control" name="qdescription" id="qdescription" rows="3" placeholder="describe your concern here..." ></textarea>
</div>';
if(isset ($_SESSION['loggedin']) ){
echo '<button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form></div>';
}else {
    echo '<p class="display-4">Login to post a question</p><a class="btn btn-outline-primary ml-1" href="user_login.php?requrl='.$_SERVER['REQUEST_URI'].'" role="button">Login</a>
    </form></div>';
}
?>
    <div class="container bg-light">
        <h3>Discussions:</h3>
        <?php
// questioons start here
$sql= "SELECT * FROM `forum_questions` WHERE `question_category`='$cat'";
$result= mysqli_query($conn,$sql);
$row= mysqli_num_rows($result);
$noquestion= true;
// echo $row;
if ($row>0) {

    while ($row=mysqli_fetch_assoc($result)) {
        
        $qtitle= $row['question_title'];
        $user = $row['user_name'];
        $qdesc= $row['question_details'];
        $time= $row['time'];
        $qid= $row['question_id'];
        
        echo '<div class="container border my-4 bg-light py-3 px-3 h-50"><div class="media">
        <img src="../images/user_default_image.jpg" id="userimage" width="80rem" class="mr-3" alt="...">
        <div class="media-body">
        <h5 class="mt-0">'.$qtitle.'</h5>
        <p>'.substr($qdesc,0,50).'...</p>
        <small class="text-muted">'."posted on ".$time." by ".$user.'</small>
        </div><span class="mt-4"><a class="btn btn-primary" href="forum_answer_page.php?question='.$qid.'&cat='.$id.'" role="button">explore</a></span>
        </div></div>';
    }
}
else {
    echo '<div class="container"><div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="">No Questions Found</h3>
      <p class="lead">Be the first member to ask a question.</p>
    </div>
  </div></div>';
}

?>
    </div>
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