<?php
$alert= false;
$salert=false;
date_default_timezone_set('Asia/Kolkata');
include 'pages/dbconnect.php';
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
      <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
      <!-- Bootstrap CSS -->
      <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>Welcome <?php echo $_SESSION['username']?></title>
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      
    </head>
    <body>
<h2>Generated notice</h2>

<div class="container my-4">

    <table class="table text-wrap" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Notice Title</th>
              
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
              
                <td><!-- <button class='edit btn btn-sm btn-primary' id=".$row['exam_id'].">Edit</button>--> <button class='delete btn btn-sm btn-primary' id=".$row['srl'].">Delete</button> </td>
              </tr>";
               $no=$no+1;
              }
               }
               
            ?>


        </tbody>
    </table>

</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>
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

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `test.php?delete=${sno}`;
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