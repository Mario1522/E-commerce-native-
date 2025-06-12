<?php
      include './style/navbar.php';
      include './style/sidebar.php';
?>




<?php
if(! isset($_GET['categories'])){
    include './includes/categories/view.php';
}elseif($_GET['categories']=='add'){
    include './includes/categories/add.php';
}elseif($_GET['categories']=='edit'){
    include './includes/categories/edit.php';
}
?>
























<?php
      include './style/footer.php';
?>