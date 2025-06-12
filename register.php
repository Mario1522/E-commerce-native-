<?php
include 'style/nav.php';

?>


<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Registration</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
<li>Registration</li>
</ul>
</div>
</div>
</div>
</div>


<div class="account-login section">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
<div class="register-form">
<div class="title">
<h3>No Account? Register</h3>
<p>Registration takes less than a minute but gives you full control over your orders.</p>
</div>


   
<form action="functions/auth/handle-register.php" class="row align-items-center" method="post">



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








<div class="col-lg-3 col-sm-3 mt-2 d-flex flex-column mb-3 ">
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
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>



</div>
</div>
</div>
</div>
</div>


<?php
include 'style/footer.php'
?>