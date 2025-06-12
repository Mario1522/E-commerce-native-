<?php
$id = $_GET['id'];
include './functions/connection.php';

$query = "SELECT * FROM `users` WHERE id = $id";
$run = mysqli_query($connection,$query);
if(mysqli_num_rows($run) == 1){
  $user = mysqli_fetch_assoc($run);
}else{
  header("location:./users.php?users=view");
}

if($_SESSION['login']['role']=='admin' && $_SESSION['login']['id'] != $user['id'] && $user['role']=='admin' || $user['role'] == "owner"){
  $id = $_SESSION['login']['id'];
      $query = "SELECT * FROM `users` WHERE id = $id";
    $run = mysqli_query($connection,$query);
    if(mysqli_num_rows($run) == 1){
      $user = mysqli_fetch_assoc($run);
    }else{
      header("location:./users.php?users=view");
    }
  // header("location:404.php");
}

?>






<form action="functions/users/update.php?id=<?php echo $user['id'] ?>" class="row align-items-center" method="post" enctype="multipart/form-data">



  <div class="col-lg-6  col-sm-12 mb-3">
    <?php
    if(isset($_SESSION['errors']['name'])){?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['errors']['name'] ?>
        </div>
    <?php } 
    unset($_SESSION['errors']['name']);
    ?>
    <label class="visually-hidden" for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user["name"] ?>">
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
      <label class="visually-hidden" for="email">Email</label>
      <div class="input-group">
          <div class="input-group-text">@</div>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $user["email"] ?>">
        </div>
    </div>



  <div class="col-lg-6 col-sm-12 mt-2 d-flex flex-column mb-3">
  <?php
    if(isset($_SESSION['errors']['role'])){?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['errors']['role'] ?>
        </div>
    <?php } 
    unset($_SESSION['errors']['role']);
    ?>
    <label class="visually-hidden" for="role">role</label>
    <select class="form-select" id="role" name="role">
      <option <?php echo ($user['role']=='user') ? "selected" : '' ?> value="user">User</option>
      <option <?php echo ($user['role']=='admin') ? "selected" : '' ?> value="admin">Admin</option>
    </select>
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
    <label class="visually-hidden" for="gender">gender</label>
    <select class="form-select" id="gender" name="gender">
      <option <?php echo ($user['gender']=='male') ? "selected" : '' ?> value="male">Male</option>
      <option <?php echo ($user['gender']=='female') ? "selected" : '' ?>  value="female">Female</option>
    </select>
  </div>
 


  <div class="col-auto">
    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
  </div>
</form>