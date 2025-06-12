<?php

     $id = $_GET["id"];

    include '../connection.php';

    $q = "select * from products where id = $id";

    $r = mysqli_query($connection,$q);

    $product = mysqli_fetch_assoc($r);

    $old_imgs = explode("+",$product['image']);





 $query = "DELETE FROM `products` WHERE id = $id";

 $run = mysqli_query($connection,$query);

 if($run){
    foreach ($old_imgs as $key => $value) {
        unlink("../../images/$value");
    }
    header("location:../../products.php");
 }