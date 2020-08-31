<?php

require ('dbconnect.php');
session_start();
if ($_SESSION['admin']!=true) {
  echo '<div class="alert alert-danger" role="alert">
  Please login from a admin account to access this page! If you logedin from a incorrect accout, Please logout by clicking the logout btn here <a class="btn btn-primary" href="logout.php" role="button">logout</a>
  <div><small id="email" class="form-text text-muted">Please contact webmaster if you are a admin. </small>
</div><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
';
echo "Your Current login type is =>".$_SESSION['usertype'];

  exit;
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: user_login.php");
    exit;
}
date_default_timezone_set('Asia/Kolkata');
$alert=false;
$update = false;
$delete = false;
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `srl` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

  // Sql query to be executed
  $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`srl` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the Notice successfully";
}
}
else{
    $title = $_POST["title"];
    $description = $_POST["description"];

  // Sql query to be executed
  $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $alert = true;
  }
  else{
      echo "The Notice was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//   $title = $_POST['title'];
//   $description = $_POST['desc'];
  
// // Submit these to a database
// $sql= "INSERT INTO `notes` (`srl`, `title`, `description`, `time`) VALUES (NULL, '$title', '$description', current_timestamp());";
// $result= mysqli_query($conn, $sql);
// if ($result) {
//   $alert=true;
// }}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="icon" href="../images/siteicon.jpg" type="image/jpg" />
    <title>Admin Page</title>
  </head>
  <body>
    <?php include "navbaradmin.php" ?>
    <!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Edit Modal
</button> -->

<!-- editModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="admin_page.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

   
    <?php
    if ($alert) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Notice has been Created successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
    }

    ?>
    <?php
    if($delete){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Notice has been deleted successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    ?>
    <?php
    if($update){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Notice has been updated successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    ?>
    <div class="container my-4">
      <h3>ADD YOUR Notice</h3>
      <form action="admin_page.php" method="POST">
        <div class="form-group">
          <label for="title">Notice Title</label>
          <input
            type="text"
            name="title"
            class="form-control"
            id="title"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="form-group">
          <label for="Desc">Description</label>
          <textarea
            class="form-control"
            name="description"
            placeholder="enter your notes here..."
            id="description"
            rows="3"
          ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Notice</button>
      </form>
      <div class="container my-4">
        
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Notice Title</th>
              <th scope="col">Description</th>
              <th scope="col">Date and Time Added</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql= "SELECT * FROM `notes`";
            $result= mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num>0) { 
              $no=1;
              while ($row= mysqli_fetch_assoc($result)) { 
              echo "<tr>
              <th scope='row'>". $no . "</th>
              <td>". $row['title'] . "</td>
              <td>". $row['description'] . "</td>
              <td>". $row['time'] . "</td>
              <td><button class='edit btn btn-sm btn-primary' id=".$row['srl'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['srl'].">Delete</button> </td>
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
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("edit ");
      tr = e.target.parentNode.parentNode;
      title = tr.getElementsByTagName("td")[0].innerText;
      description = tr.getElementsByTagName("td")[1].innerText;
      console.log(title, description);
      titleEdit.value = title;
      descriptionEdit.value = description;
      snoEdit.value = e.target.id;
      console.log(e.target.id)
      $('#editModal').modal('toggle');
    })
  })

  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("edit ");
      sno = e.target.id.substr(1);

      if (confirm("Are you sure you want to delete this Notice!")) {
        console.log("yes");
        window.location = `admin_page.php?delete=${sno}`;
        // TODO: Create a form and use post request to submit a form
      }
      else {
        console.log("no");
      }
    })
  })
</script>
  </body>
  <?php include 'footer.php'; ?>
</html>
