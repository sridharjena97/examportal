<?php 

session_start();
include 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');

?>
<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Wlcome To Forum </title>
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
</head>
<style>
@media only screen and (max-width: 1000px) {
    #carouselExampleCaptions {
        display: none;
    }
}
</style>

<body>
    <?php include 'navbaruser.php' ?>
    <!-- crousel start here -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/slide1.png" style="opacity: 0.7;" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-none d-md-block">
                    <h5>Welcome to Our Forum</h5>
                    <p>Ask Your All Concerns Here</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/slide2.png" style="opacity: 0.7;" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-none d-md-block">
                    <h5>A large Forum</h5>
                    <p>Sharpen your knowledge and get the latest updates from our qualified teachers.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/slide3.png" style="opacity: 0.7;" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-none d-md-block">
                    <h5>Teachers are ready to help you.</h5>
                    <p>Use the searchbar to search the forum.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container my-3" style="margin-bottom: 2.5rem!important;">
    <div class=" container">
    <form method="get" action="search.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search"  id="search"type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    <div class="container my-4">
        <h2>Forum Discussions:</h2>
        <div class="row my-4">
            <!-- catagories -->
            <?php
    $sql='SELECT * FROM `forum_categories`';
    $result= mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_assoc($result)) {
      $title= $row['title'];
      $desc= $row['description'];
      $cat= $row['category'];
      $id= $row['forum_cat_srl'];
      echo ' <div class="col-md-4 my-2"><div class="card " style="width: 18rem;">
          <img src="../images/'.$cat.".png".'" class="card-img-top" alt="...">
          <div class="card-body">
              <h5 class="card-title"><a href="forum_question_page.php?catid='.$id.'">'.$title.'</a></h5>
              <p class="card-text"> '.substr($desc,0,50) .'...</p>
              <a href="forum_question_page.php?catid='.$id.'" class="btn btn-primary">Open Discussion</a>
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