
<?php $alert= false; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <title>Login Page</title>
    <style>
      body::before{
            background: url('../images/login.jpg') no-repeat center center/cover;
            content: "";
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.7;
          }
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
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password =$_POST['password'];
            $sql= "SELECT * FROM users_scl WHERE email = '$email' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $num = mysqli_num_rows($result);
            //$hash= $row['password'];
           
            if ($num>0) {            
            $type=$row['usertype'];
            if (password_verify ($password , $row['password'] )) {
              $login = true;
              $part1= $_GET['requrl']; $part2=$_GET['cat']; $url="$part1&cat=$part2";
              
              session_start();
              $_SESSION['loggedin'] = true;
              $username= $row['firstname'].' '.$row['lastname'];
              $email= $row['email'];
              $_SESSION['username'] = $username;
              $_SESSION['email'] = $email;
              $_SESSION['usertype'] = $type;
              $_SESSION['teacher'] = false;
              $_SESSION['admin'] = false;
              $_SESSION['user'] = false;
              
              switch ($type) {
                case 'admin':
                  $_SESSION['admin'] = true;
                  $_SESSION['teacher'] = true;
                  if ($url!=NULL && $part1!=NULL) {
                    header("location: http://157.245.97.17$url");
                  break;
                  }else {
                    header("location: admin_page.php");
                  }
                  
                  break;
                case 'teacher':
                  
                  $_SESSION['teacher'] = true;
                  $_SESSION['admin'] = false;
                  
                  if ($url!=NULL && $part1!=NULL) {
                    header("location: http://157.245.97.17$url");
                  }else {
                    header("location: teacher_page.php");
                  }
                  break;
                case 'user':
                  
                  $_SESSION['user'] = true;
                  
                  if ($url!=NULL && $part1!=NULL) {
                    // change the header when web change
                    header("location: http://157.245.97.17$url");
                  }else {
                    header("location: student_page.php");
                  }
                  break;
                
                default:
                  $alert=true;
                  break;
              }
            
          }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failed!</strong> Please check your email or password !!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Failed!</strong> Please check your email or password !!!!
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
  <h3 class="text-center"><u>Login Kiosk</u> </h3>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me!</label>
  </div>
  <button name="login" type="submit" class="btn btn-primary">Login</button>
  
  <a href="/">&lt;back to home</a>
  <div class="container mt-4"><p >Don't have an account? <a class="btn btn-outline-success" href="signup.php" role="button">SignUP</a></p></div>
  <?php if ($alert) {
    echo "Something went wrong. Please contact webmaster";
  }?>
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