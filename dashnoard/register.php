<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
<form action="functions/auth/h-reg.php" class="row align-items-center" method="post" enctype="multipart/form-data">



<div class="col-lg-6  col-sm-12 mb-3">
  <?php
  if(isset($_SESSION['errors']['name'])){?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['errors']['name'] ?>
      </div>
  <?php } 
  unset($_SESSION['errors']['name']);
  ?>
  <label for="name">Name</label>
  <input type="text" class="form-control" id="name" name="name" >
</div>



<div class="col-lg-6  col-sm-12 mb-3">
<?php
  if(isset($_SESSION['errors']['email'])){?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['errors']['email'] ?>
      </div>
  <?php } 
  unset($_SESSION['errors']['email']);
  ?>
    <label for="email">Email</label>
    <div class="input-group">
        <div class="input-group-text">@</div>
        <input type="email" class="form-control" id="email" name="email">
      </div>
  </div>




  <div class="col-lg-6  col-sm-12 mb-3">
  <?php
  if(isset($_SESSION['errors']['password'])){?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['errors']['password'] ?>
      </div>
  <?php } 
  unset($_SESSION['errors']['password']);
  ?>
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>




<div class="col-lg-6 col-sm-12 mt-2 d-flex flex-column mb-3 ">
<?php
  if(isset($_SESSION['errors']['gender'])){?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['errors']['gender'] ?>
      </div>
  <?php } 
  unset($_SESSION['errors']['gender']);
  ?>
  <label for="gender">gender</label>
  <select class="form-select" id="gender" name="gender">
    <option selected value="male">Male</option>
    <option value="female">Female</option>
  </select>
</div>



<div class="col-auto">
  <button type="submit" name="add" class="btn btn-primary">Add</button>
</div>
</form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
