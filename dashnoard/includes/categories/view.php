<?php
include './functions/connection.php';
$query = "SELECT * FROM `category`";
$run = mysqli_query($connection,$query);

?>


<a href="?categories=add" class="btn btn-primary">Add Category</a>

<table class="table mt-5 w-50">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Edit & Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(mysqli_num_rows($run) > 0){
    $categories = mysqli_fetch_all($run,MYSQLI_ASSOC);
    foreach($categories as $key => $value){?>
        <tr>
        <th scope="row" ><?php echo $key + 1 ?></th>
        <td class=><?php echo $value['name'] ?></td>
              <td>
              <a href="?categories=edit&id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
              <?php include 'includes/categories/modal.php' ?>
              </td>
        
    
      </tr>
    <?php }


    }?>
   
  </tbody>
</table>