<?php

require'dbconnect.php';
$uexist= false;
$passdmatch= false;
$shwalrt= false;
$regdexist= false;
if(isset($_POST['signup'])){
  $firstname = $_POST['fname'];
  $firstname = str_replace("<","&lt;",$firstname);
  $firstname = str_replace(">","&gt;",$firstname);
  $lastname = $_POST['lname'];
  $lastname = str_replace("<","&lt;",$lastname);
  $lastname = str_replace(">","&gt;",$lastname);
  $regdno = $_POST['regdno'];
  $regdno = str_replace("<","&lt;",$regdno);
  $regdno = str_replace(">","&gt;",$regdno);
  $password =$_POST['password'];
  $cpassword = $_POST['cpassword'];
  $email = $_POST['email'];
  $email = str_replace("<","&lt;",$email);
  $email = str_replace(">","&gt;",$email);
  $mobile = $_POST['mobile'];
  $mobile = str_replace("<","&lt;",$mobile);
  $mobile = str_replace(">","&gt;",$mobile);
  $dob = $_POST['dob'];
  $class = $_POST['class'];
  $section = $_POST['section'];
  $stream = $_POST['stream'];
  $message = " $firstname $lastname of class $class and section $section with admission no:<strong> $regdno </strong> would like to request an account.";
  $sql1= "SELECT * FROM users_scl WHERE email = '$email' ";
  $result1 = mysqli_query($conn, $sql1);
  $num1 = mysqli_num_rows($result1);
 
  if ($num1>0) {
    $uexist= true;
  }
  $sql2= "SELECT * FROM users_scl WHERE regdno = '$regdno' ";
  $result2 = mysqli_query($conn, $sql2);
  $num2 = mysqli_num_rows($result2);
  // echo $num2;
  if ($num2>0) {
    $regdexist= true;
    
  }
  $sql3= "SELECT * FROM requests WHERE regdno = '$regdno' ";
  $result3 = mysqli_query($conn, $sql3);
  $num3 = mysqli_num_rows($result3);
  // echo $num3;
  if ($num3>0) {
    $regdexist= true;
    
  }
  if ($password!==$cpassword) {
    $passdmatch= true;
  }
 
  if ($password==$cpassword && $uexist!=true && $regdexist!=true) {
        $password= password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `requests` (`userid`, `firstname`, `lastname`,`regdno`, `email`, `password`, `mobile`, `dob`, `class`, `section`,`stream`, `signuptime`, `message`) VALUES (NULL, '$firstname', '$lastname','$regdno', '$email', '$password', '$mobile', '$dob', '$class', '$section','$stream', current_timestamp(), '$message')";
        $result= mysqli_query($conn, $sql);
        if ($result) {
          $shwalrt= true;
        }else {
          $uexist=true;
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
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Signup Page</title>

    <style>
      #loginarea{
        width: 50vw;
      }
      @media only screen and (max-width: 1600px) {
        #loginarea{
        width: 30vw;
      }
      }
      @media only screen and (max-width: 1100px) {
        #loginarea{
        width: 40vw;
      }
      }
      @media only screen and (max-width: 800px) {
        #loginarea{
        width: 50vw;
      }
      }
      @media only screen and (max-width: 600px) {
        #loginarea{
        width: 80vw;
      }
      }
    </style>
  </head>
  <?php
    if ($uexist) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Signup Failed!</strong> user already exist.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
    if ($shwalrt) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Signup Sucess!</strong> Please Wait for approval of your account.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
    if ($passdmatch) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Signup Failed!</strong> password doesnot match.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
    if ($regdexist) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Signup Failed!</strong> Admission No already SignedUP.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
    
  ?>
  <body>
  <div id="loginarea" class="container shadow-lg mt-5 bg-white rounded ">
  <form method="post" enctype="multipart/form-data">
      <h3 class="text-center"><u>SignUP Here</u> </h3>
  <div class="form-group ">
    <p class="text-danger">* fields are mandetory.</p>
    <label for="fname">Your First Name*</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" placeholder="Your First Name"require!>
  </div>
  <div class="form-group ">
    <label for="lname">Your Last Name*</label>
    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp" placeholder="Your Last Name" require!>
  </div>
  <div class="form-group ">
    <label for="regdno">Admission No*</label>
    <input type="text" class="form-control" id="regdno" name="regdno" aria-describedby="emailHelp" placeholder="Your Admission No" require!>
  </div>
  <div class="form-group ">
    <label for="exampleInputEmail1">Email address*</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Your Email" require!>
    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Password*</label>
    
    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" name="password" id="password" placeholder="Your password" require!>
    <small class="form-text text-muted">Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</small>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Confirm Password*</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword"placeholder="Confirm your password"require!>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Mobile Number</label>
    <input type="tel" pattern="[0-9]{10}" class="form-control" name="mobile" id="mobile"placeholder="Your mobile number">
    <small id="mobile" class="form-text text-muted">Enter your 10 digit mobile no (don't add +91)</small>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Date of Birth*</label>
    <input type="date" class="form-control" name="dob" id="dob" placeholder="Your DOB"require!>
  </div>
  <div class="input-group mb-3 ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Select Your Class*</label>
  </div>
  <select class="custom-select" name="class" id="class" require!>
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
    <label class="input-group-text" for="inputGroupSelect01"> Select Your Section*</label>
  </div>
  <select require! class="custom-select" name="section" id="section" >
    <option value="">None</option>
    <option value="A">Section-A</option>
    <option value="B">Section-B</option>
    <option value="C">Section-C</option>
    <option value="D">Section-D</option>
    <option value="E">Section-E</option>
  </select>
</div>
  
  
  <button name="signup" type="submit" class="btn btn-primary">SignUP</button>
  <button type="reset" class="btn btn-primary">Reset</button>
  <div><a href="/">&lt;back to home</a></div>
  <div class="container p-1 mt-2"><p >Already have an account? <a class="btn btn-outline-success" href="user_login.php" role="button">LogIN</a></p></div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  <?php include 'footer.php'; ?>
</html>