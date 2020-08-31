<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <style>
     body::before{
            background: url('images/home2.jpg') no-repeat center center/cover;
            content: "";
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.9;
        }

    #clock {
        position: absolute;
        top: 14%;
        right: 1%;

    }
    #ticker{
        width: 40vw;
        height: auto;
        overflow: hidden;
        border-radius: 3rem;
        padding: 1rem 2rem;
        
    }
    .tickerul{
        background-color: white;
        margin-left: 10vw;
        margin: 0px;
        padding: 0rem 10rem;
        border-radius: 0.5rem;
    }
    .tickerul li{
        list-style-type: none;
    }
    @media only screen and (max-width: 1000px) {
        #clock {
            display: none;
        }
    } 
    @media only screen and (max-width: 1600px) {
        #ticker{
            width: 45vw;
            height: auto;
            overflow: hidden;
            border-radius: 3rem;
            padding: 6px 36px !important;
            margin: 0rem 0.5rem !important;
        
    }
    .tickerul{
        background-color: white;
        margin-left: 10vw;
        margin: 0px;
        padding: 0rem 2rem;
        border-radius: 0.5rem;
    }
    .tickerul li{
        list-style-type: none;
    }
    }
    @media only screen and (max-width: 900px) {
        #ticker{
            width: 75vw;
            height: auto;
            overflow: hidden;
            border-radius: 3rem;
            padding: 6px 36px !important;
            margin: 0rem 0.5rem !important;
        
    }
    .tickerul{
        background-color: white;
        margin-left: 10vw;
        margin: 0px;
        padding: 0rem 2rem;
        border-radius: 0.5rem;
    }
    .tickerul li{
        list-style-type: none;
    }
    }
    @media only screen and (max-width: 600px) {
        body::before{
            background: url('images/home1.jpg') no-repeat center center/cover;
            content: "";
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.6;
        }
        
        #ticker{
            width: auto;
            height: 24vh;
            overflow: hidden;
            border-radius: 3rem;
            padding: 6px 36px !important;
            margin: 0rem 0.5rem !important;
        
    }
    .tickerul{
        background-color: white;
       
        margin-left: 10vw;
        margin: 0px;
        padding: 0rem 2rem;
        border-radius: 0.5rem;
    }
    .tickerul li{
        list-style-type: none;
    }
    }
    </style>
    <link rel="icon" href="images/siteicon.jpg" type="image/jpg" />
    <title>Welcome to Exam Portal</title>
    
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/forum.php">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/examselector.php">Exams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/result_selector.php">Results</a>
            </li>
            
            
        </ul>
    </div>
    <div class="mx-auto order-0">
    
        <a class="navbar-brand mx-auto" href="#">YOUR SCHOOL NAME</a>
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              
          </li>
          <?php
           if(isset($_SESSION['loggedin'])!=true ){
            echo '<li class="nav-item">
            <a class="btn btn-outline-success ml-1" href="pages/user_login.php" role="button">Login</a>
            </li>
            <li class="nav-item">
            <a class="btn btn-outline-primary ml-1" href="pages/signup.php" role="button">Signup</a>
            </li>
            ';
        }else {
            echo '<li class="nav-item">
            <a class="btn btn-danger ml-1" href="pages/logout.php" role="button">Logout</a>
            </li>';
        }
          
          ?>
           
          
            
        </ul>
    </div>
</nav>

    <!-- heading here -->
  <div class="container-sm h-80 text-white" style="height: 50vh;">
    <img src="images/siteicon.jpg" class="mx-auto d-block my-2" style=" width:10vw; height: 10vw" alt="...">
    <div class="mx-auto d-block text-capitalize ">
    <h1 class="text-center">WELCOME TO EXAM PORTAL</h1>
        <h6 class="font-italic text-center">An Online Platform for students....<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-easel-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8.473.337a.5.5 0 0 0-.946 0L6.954 2h2.092L8.473.337zM12.15 11h-1.058l1.435 4.163a.5.5 0 0 0 .946-.326L12.15 11zM8.5 11h-1v2.5a.5.5 0 0 0 1 0V11zm-3.592 0H3.85l-1.323 3.837a.5.5 0 1 0 .946.326L4.908 11zM1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3z"/>
</svg></h6>
        
    </div>
    </div>
    <!-- notice board start -->
    
    <div id="ticker" class="container-fluid bg-primary mx-3 my-4">
    <ul id="news" class="tickerul">
        <li><b>First</b> Notice from school!  <span class="badge badge-secondary">New</span></li>
        <li><b>Second</b> Notice from school!  <span class="badge badge-secondary">New</span></li>
        <li><b>Third</b> Notice from school!  <span class="badge badge-secondary">New</span></li>
        <li><b>Fourth</b> Notice from school!  <span class="badge badge-secondary">New</span></li>
        <li><b>Fifth</b> Notice from school!  <span class="badge badge-secondary">New</span></li>
        <li><b>Last</b> Notice romr school!  <span class="badge badge-secondary">New</span></li>
    </ul>
    </div>
    <?php include 'pages/footer.php'; ?>


    
    <!-- noticeboard end -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        var interval;
        function startticker(){
            $("#news li:first").slideUp(function(){
                $(this).appendTo($("#news")).slideDown();
                $
            });
        }
        function stopticker(){
            clearInterval(interval);
        }

        $(document).ready(function(){
        interval= setInterval(startticker,3000);
        $("#news").hover(function(){
            stopticker();
        },function(){
            interval= setInterval(startticker,3000);
        })

        });

        


    </script>

    
</body>

</html>
