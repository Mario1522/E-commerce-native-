<?php
include 'functions/connection.php';

$query = "select * from products";

$run = mysqli_query($connection,$query);


?>






<a href="?products=add" class="btn btn-primary">Add Product</a>


<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Sale</th>
      <th scope="col">Count</th>
      <th scope="col">Categoty</th>
      <th scope="col">Image</th>
      <th scope="col">Edit/Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(mysqli_num_rows($run) > 0){
        $products = mysqli_fetch_all($run,MYSQLI_ASSOC);
        foreach ($products as $key => $value) {?>
            <tr>
              <th><?php echo $key + 1 ?></th>
              <td><?php echo $value['name'] ?></td>
              <td><?php echo $value['price'] ?></td>
              <td><?php echo $value['sale'] ?></td>
              <td><?php echo $value['count'] ?></td>
              <td><?php echo $value['category'] ?></td>
              <td class="w-50">
                <?php
                $imgs = explode("+",$value['image']);
                foreach($imgs as $k => $val){?>
                  <img src="images/<?php echo $val ?>" alt="" width="50px">
               <?php }
                ?>
              </td>
              <td>
              <a href="?products=edit&id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
              <?php include 'includes/products/modal.php' ?>
              </td>
            </tr>
      <?php  }
      }
      ?>
   
  </tbody>

