
<form action="functions/categories/insert.php" class="row align-items-center" method="post">



  <div class="col-lg-8">
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



 


  <div class="col-lg-6 mt-5">
    <button type="submit" name="add" class="btn btn-primary w-100">Add</button>
  </div>
</form>