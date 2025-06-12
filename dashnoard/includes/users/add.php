
<form action="functions/users/insert.php" class="row align-items-center" method="post">



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



  <div class="col-lg-3 col-sm-6 mt-2 d-flex flex-column mb-3">
  <?php
    if(isset($_SESSION['errors']['role'])){?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['errors']['role'] ?>
        </div>
    <?php } 
    unset($_SESSION['errors']['role']);
    ?>
    <label for="role">role</label>
    <select class="form-select" id="role" name="role">
      <option selected value="user">User</option>
      <option value="admin">Admin</option>
      <option value="owner">Owner</option>
    </select>
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
    <button type="submit" name="add" class="btn btn-primary">Add</button>
  </div>
</form>