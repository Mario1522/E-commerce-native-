<?php
$id = $_GET['id'];
include './functions/connection.php';

$query = "SELECT * FROM `category` WHERE id = $id";
$run = mysqli_query($connection,$query);
if(mysqli_num_rows($run) == 1){
  $user = mysqli_fetch_assoc($run);
}else{
  header("location:./category.php?users=view");
}

?>






<form action="functions/categories/update.php?id=<?php echo $user['id'] ?>" class="row align-items-center" method="post" enctype="multipart/form-data">



  <div class="col-lg-8">
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


 


  <div class="col-lg-6 mt-5">
    <button type="submit" name="edit" class="btn btn-primary w-100">Edit</button>
  </div>
</form>