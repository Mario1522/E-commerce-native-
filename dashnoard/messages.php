<?php
include 'style/navbar.php';
include 'style/sidebar.php';
include 'functions/connection.php';
$query = 'select * from messages';
$run = mysqli_query($connection,$query);

if (mysqli_num_rows($run) > 0) {
    $messages = mysqli_fetch_all($run,MYSQLI_ASSOC);?>
    <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($messages as $key => $value){?>
        <tr>
        <th scope="row"><?php echo $key + 1 ?></th>
        <td><?php echo $value['name'] ?></td>
        <td><?php echo $value['email'] ?></td>
        <td><?php echo $value['phone'] ?></td>
        <td class="_td"><?php echo ($value['status']==0)?"unread":"read" ?></td>
        <td><?php include 'functions/messages/modal.php' ?></td>
        <td>
 
        </td>
      </tr>
    <?php }


    ?>
   
  </tbody>
</table>
<?php }else{

}
?>




<?php
include 'style/footer.php';
?>