<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forum.php">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="examselector.php">Exams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="result_selector.php">Results</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="result.php">Result</a>
            </li> -->
            
            
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Hii <?php if(isset ($_SESSION['loggedin']) ){echo "-". $_SESSION['username'];} else {
            # code...
        } ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <small class="text-white"><?php echo 'Today: ';echo date('l jS \of F Y ');?></small>
          </li>
          <?php
           if(isset($_SESSION['loggedin'])!=true ){
            echo '<li class="nav-item">
            <a class="btn btn-outline-success ml-1" href="user_login.php?requrl='.$_SERVER['REQUEST_URI'].'" role="button">Login</a>
            </li>
            <li class="nav-item">
            <a class="btn btn-outline-primary ml-1" href="signup.php" role="button">Signup</a>
            </li>
            ';
        }else {
            echo '<li class="nav-item">
            <a class="btn btn-danger ml-1" href="logout.php" role="button">Logout</a>
            </li>';
        }
          
          ?>
           
          
            
        </ul>
    </div>
</nav>