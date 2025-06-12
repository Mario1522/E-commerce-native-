<?php
include 'style/navbar.php';
include 'style/sidebar.php';





if(! isset($_GET['products'])){
    include 'includes/products/view.php';
}elseif($_GET['products'] == 'add'){
    include 'includes/products/add.php';
}elseif($_GET['products'] == 'edit' && isset($_GET['id'])){
    include 'includes/products/edit.php';
}else{
    include '404.php';
}




















include 'style/footer.php';
?>