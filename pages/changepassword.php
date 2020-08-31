<?php
include 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <title>Reset Password Page</title>
    <style>
      /* body::before{
            background: url('../images/login.jpg') no-repeat center center/cover;
            content: "";
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.7;
          } */
      #loginarea{
        width: 20vw;
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
    require'dbconnect.php';
        if(isset($_POST['changepassword'])){
            $email = $_SESSION['email'];
            $oldpassword =$_POST['oldpassword'];
            $newpassword =$_POST['newpassword'];
            $cpassword =$_POST['cpassword'];
            $sql= "SELECT * FROM users_scl WHERE email = '$email' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
           
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
                header("location: user_login.php");
                exit;
            }           
                if (password_verify ($oldpassword , $row['password'] )) {
                    if ($newpassword==$cpassword) {
                        $newpassword= password_hash($newpassword, PASSWORD_DEFAULT);
                        $sql2= "UPDATE `users_scl` SET `password` = '$newpassword' WHERE `users_scl`.`email` = '$email';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Password Updated!</strong> Effective from next login!!!!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';header("location: logout.php");
                        }else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Unknown Error Occourred!</strong> Please check your email or password !!!!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>';
                                }
                    }else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Check Your Password!</strong> Try Again!!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                           }
                 }else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Check Your old Password!</strong> Try Again!!!!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                       }

        }
        ?>
  <body>

<div id="loginarea" class="container shadow-lg p-3 mb-5 mt-5 bg-white rounded ">
  <form method="post" >
  <h3 class="text-center"><u>Reset Your Password Here</u> </h3>
  
  <div class="form-group">
    <label for="password">Current Password</label>
    <input type="password" name="oldpassword" class="form-control" id="password">
  </div>
  <div class="form-group">
    <label for="newpassword">New Password</label>
    <input type="password" name="newpassword" class="form-control" id="newpassword">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm New Password</label>
    <input type="password" name="cpassword" class="form-control" id="cpassword">
  </div>
 
  <button name="changepassword" type="submit" class="btn btn-primary">Change Password</button>
  <button type="reset" class="btn btn-primary">Reset</button>
  
 
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  <?php include 'footer.php'; ?>

</style>
</html>