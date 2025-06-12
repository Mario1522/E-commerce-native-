<?php
include './functions/connection.php';
$query = "SELECT * FROM `users`";
$run = mysqli_query($connection,$query);

?>


<a href="?users=add" class="btn btn-primary">Add User</a>

<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Gender</th>
      <th scope="col">Edit/Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(mysqli_num_rows($run) > 0){
    $users = mysqli_fetch_all($run,MYSQLI_ASSOC);
    foreach($users as $key => $value){?>
        <tr>
        <th scope="row" class="<?php echo ($_SESSION['login']['id']==$value['id'])? "text-success" : ""?>" ><?php echo $key + 1 ?></th>
        <td class="<?php echo ($_SESSION['login']['id']==$value['id'])? "text-success" : ""?>" ><?php echo $value['name'] ?></td>
        <td class="<?php echo ($_SESSION['login']['id']==$value['id'])? "text-success" : ""?>" ><?php echo $value['email'] ?></td>
        <td class="<?php echo ($_SESSION['login']['id']==$value['id'])? "text-success" : ""?>" ><?php echo $value['role'] ?></td>
        <td class="<?php echo ($_SESSION['login']['id']==$value['id'])? "text-success" : ""?>" ><?php echo $value['gender'] ?></td>
        <?php
       
          if($_SESSION['login']['id'] == $value['id'] && $_SESSION['login']['role'] == 'admin' || $value['role'] == 'user' || $_SESSION['login']['role'] == 'owner'){?>
              <td>
              <a href="?users=edit&id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
              <?php include 'includes/users/modal.php' ?>
              </td>
          <?php }else{ ?>
            <td>
              <b class="text-center text-danger" style="opacity:0.5">Not Allowed!!</b>
            </td>
         <?php }
        ?>
      </tr>
    <?php }


    }?>
   
  </tbody>
</table>