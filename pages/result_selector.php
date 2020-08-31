<?php
$error=false;
if(isset($_POST['submit'])){
    $class = $_POST['class'];
    $stream = $_POST['stream'];
    $section = $_POST['section'];
    if ($class!=null && $stream!=null) {
        header("location: result.php?class=$class&stream=$stream&section=$section");
    }else{
        $error=true;
    }


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Result Page</title>
</head>

<body>
<?php include 'navbarpublic.php'; ?>
    <?php
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something Went Wrong!</strong> Unexpected error !!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <!-- form starts here  -->
    <div class="container my-4">
        <h2>Result Finder</h2>
        <form method="post">
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
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
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