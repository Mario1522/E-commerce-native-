<?php
      include './style/navbar.php';
      include './style/sidebar.php';
?>




<?php
if(! isset($_GET['users'])){
    include './includes/users/view.php';
}elseif($_GET['users']=='add'){
    include './includes/users/add.php';
}elseif($_GET['users']=='edit'){
    include './includes/users/edit.php';
}
?>
























<?php
      include './style/footer.php';
?>