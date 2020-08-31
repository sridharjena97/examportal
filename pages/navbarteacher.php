<nav class="navbar navbar-expand-md navbar-light bg-info">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <?php if ($_SESSION['admin']){ echo'<li class="nav-item ">
                <a class="nav-link" href="admin_page.php">Home</a>
            </li>';} else{
                echo '<li class="nav-item ">
                <a class="nav-link" href="teacher_page.php">Home</a>
            </li>';
            }?>
            
            <li class="nav-item">
                <a class="nav-link" href="userauth.php">User Authoriztion page</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Actions
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="exam_setup.php">Add Exam</a>
                    <a class="dropdown-item" href="examlist.php">View Scheduled Exams</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="result_setup.php">Add Result Notice</a>
                    <?php if ($_SESSION['admin']){ echo'';} else{
                echo '<a class="dropdown-item" href="changepassword.php">Change Password</a>';
            }?>
                    
                </div>
            </li>

        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Hii, <?php echo $_SESSION['username']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <small class="text-white"><?php echo 'Today: ';echo date('l jS \of F Y ');?></small>
            </li>
            <li class="nav-item">
                <button class="btn btn-outline-danger ml-3 my-2 my-sm-0" onclick="window.location.href='logout.php'"
                    type="btn">Logout</button>
            </li>
        </ul>
    </div>
</nav>