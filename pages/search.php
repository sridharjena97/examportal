<!doctype html>
<html lang="en">
<?php
session_start();
include 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');


?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Search Page</title>
</head>
<style>
    @media only screen and (max-width: 600px) {
        #search{
            width: 40vw;
            
        }
      
}
   
</style>

<body>

    <?php include 'navbaruser.php' ?>

    
    <div class=" container my-4" >
    <form method="get" action="search.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search"  id="search"type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    

   <!-- Search Result here -->
   <?php
$query= $_GET['search'];
$sql= "SELECT * FROM `forum_questions` WHERE MATCH (`question_title`,`question_details`) against ('$query')";
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
        $url= "forum_answer_page.php?question=$qid";
        
        echo '<div class="container border my-4 bg-light py-3 px-3"><div class="media">
        <div class="media-body">
        <h5 class="mt-0"><a href="'.$url.'">'.$qtitle.'</a></h5>
        <p>'.substr($qdesc,0,200).'...</p>
        
        </div></div></div>';
    }
}
else {
    echo '<div class="container"><div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="">No Result Found</h3>
      <ul>
    <li>Make sure that all words are spelled correctly.</li>
    <li>Try different keywords.</li>
    <li>Try more general keywords.</li>
    </ul>
    </div>
  </div></div>';
}

?>


<!-- for alterting tables ALTER TABLE forum_questions ADD FULLTEXT (`question_title`, `question_details`); -->

 
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