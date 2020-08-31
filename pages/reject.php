<?php
include 'dbconnect.php';
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

define('DBINFO','mysql:host=localhost;dbname=scl_u');
define('DBUSER','root');
define('DBPASS','Sridh@do1');

function performQuery($query){
    $con = new PDO(DBINFO,DBUSER,DBPASS);
    $stmt = $con->prepare($query);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

function fetchAll($query){
    $con = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $con->query($query);
    return $stmt->fetchAll();
}
   
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`userid` = '$id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="userauth.php">Back</a>