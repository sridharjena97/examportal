<?php
$alert= false;
$salert=false;
date_default_timezone_set('Asia/Kolkata');
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
if (isset($_POST['submit'])) {
  
  $notice_title = $_POST['notice_title'];
  $notice_link = $_POST['notice_link'];
  $class = $_POST['class'];
  $stream = $_POST['stream'];
  $section = $_POST['section'];
  $username= $_SESSION['username'];
  echo $username;
  $sql= "INSERT INTO `result` (`srl`, `notice_description`, `class`, `stream`,`created_by`, `section`, `link`, `time`) VALUES (NULL, '$notice_title', '$class', '$stream','$username', '$section', '$notice_link', CURRENT_TIMESTAMP)";
  $result= mysqli_query($conn,$sql);
  
  if ($result) {
    $salert=true;
  }else {
    $alert=true;
  }
}
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql2 = "DELETE FROM `result` WHERE `srl` = $sno";
  $result2 = mysqli_query($conn, $sql2);
  
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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <title>Welcome <?php echo $_SESSION['username']?></title>
      <style>
        @media only screen and (max-width: 1300px) {
          #table{
          overflow: scroll;
        }
      }
        
      </style>
    </head>
    <body>
    <?php include "navbarteacher.php"?>
    <?php
    if ($alert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Unexpected error !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if ($salert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!</strong> Work Done Successfully !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if ($alert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Exam Creation Failed!</strong> Unexpected error !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    
   
    
    ?>
    <a href="teacher_page.php">&#8592; Go back</a>
    <div class="container">
      <h1>Submit Result!</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="notice_title">Notice Title</label>
                <input type="text" name="notice_title" class="form-control" id="notice_title"
                    placeholder="Put your notice here" required>
            </div>
            <div class="form-group">
                <label for="notice_link">Notice Link</label>
                <input type="text" name="notice_link" class="form-control" id="notice_link"
                    placeholder="Put your link here" required>
            </div>
            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Select Class*</label>
                </div>
                <select class="custom-select" name="class" id="class" required>
                    <option value="">None</option>
                    <option value="10">Class-X</option>
                    <option value="11">Class-XI</option>
                    <option value="12">Class-XII</option>
                </select>
            </div>
            <small class="text-muted my-0">For <strong>Class-X</strong> select <strong>NA</strong></small>
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
                    <label class="input-group-text" for="inputGroupSelect01"> Select Section*</label>
                </div>
                <select required class="custom-select" name="section" id="section">
                    <option value="">None</option>
                    <option value="A">Section-A</option>
                    <option value="B">Section-B</option>
                    <option value="C">Section-C</option>
                    <option value="D">Section-D</option>
                    <option value="E">Section-E</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>

        </form>
    </div>
    <hr>
    <div class="container mx-2 my-4">
    <h2>Generated notice</h2>

    <div id="table" class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Notice Title</th>
                    <th scope="col">For Class</th>
                    <th scope="col">For Section</th>
                    <th scope="col">For Stream</th>
                    <th scope="col">Notice link</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Time Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $sql= "SELECT * FROM `result`";
                  $result= mysqli_query($conn, $sql);
                  $num = mysqli_num_rows($result);
      
                  if ($num>0) { 
                    $no=1;
                    while ($row= mysqli_fetch_assoc($result)) {
                                            
                    echo "<tr>
                    <th scope='row'>". $no . "</th>
                    <td>". $row['notice_description'] . "</td>
                    <td>". $row['class'] . "</td>
                    <td>". $row['section'] . "</td>
                    <td>". $row['stream'] . "</td>
                    <td>". $row['link'] . "</td>
                    <td>". $row['created_by'] . "</td>
                    <td>". $row['time'] . "</td>
                    <td><!-- <button class='edit btn btn-sm btn-primary' id=".$row['exam_id'].">Edit</button>--> <button class='delete btn btn-sm btn-primary' id=".$row['srl'].">Delete</button> </td>
                  </tr>";
                   $no=$no+1;
                  }
                   }
                   
                ?>


            </tbody>
        </table>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script>
              $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("delete");
            sno = event.srcElement.id;
            console.log("srlno=", sno);

            if (confirm("Are you sure you want to delete this notice!")) {
                console.log("yes");
                window.location = `result_setup.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
</body>
<?php include 'footer.php'; ?>

</html>