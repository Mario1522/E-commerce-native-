<?php

session_start();
require '../connection.php';

if(isset($_POST['submit'])){

    extract($_POST);





    $errors = [];

    if(empty($name)){
        $errors['name']="Enter Your Name Please";
    }elseif(strlen($name) < 3){
        $errors['name']="Enter Valid Name Please";
    }



    if(empty($price)){
        $errors['price']="Enter Your price Please";
    }elseif(! is_numeric($price) || $price <= 0){
        $errors['price']="Enter Valid price Please";
    }


    if(empty($sale)){
        $errors['sale']="Enter Your sale Please";
    }elseif(! is_numeric($sale) || $sale < 0){
        $errors['sale']="Enter Valid sale Please";
    }


    if(empty($count)){
        $errors['count']="Enter Your count Please";
    }elseif(! is_numeric($count) || $count <= 0){
        $errors['count']="Enter Valid count Please";
    }





    if(empty($cat)){
        $errors['cat']="Enter Your cat Please";
    }elseif(strlen($cat) < 3){
        $errors['cat']="Enter Valid cat Please";
    }



if(empty($errors)){



    $images = $_FILES['img']['name'];
    $ext = ['jpg','png','jpeg'];
    foreach ($images as $key => $value) {
        $errs = $_FILES["img"]["error"][$key];
        $extention = pathinfo($_FILES['img']['name'][$key],PATHINFO_EXTENSION);
        
        if($errs == 0){
            if(! in_array($extention,$ext)){
                $errors['img'] = "Please Enter Valide Image";
                $_SESSION['errors']= $errors;
    
                header("location:../../products.php?products=add");
            }else{

                $img_name = uniqid().".".$extention;
                move_uploaded_file($_FILES['img']['tmp_name'][$key],"../../images/$img_name");
                
                $all[] =$img_name ; 
            }
        }else{
            $errors['img'] = "Please Enter At Least One Image";
            $_SESSION['errors']= $errors;

            header("location:../../products.php?products=add");
        }
    }


    $images = implode("+",$all);



    $query = "INSERT INTO `products`
    (`name`, `price`, `sale`, `count`, `category`,`image`)
     VALUES 
    ('$name','$price','$sale','$count','$cat','$images')";

    $run = mysqli_query($connection,$query);

    if($run){
        header("location:../../products.php");
    }




}else{
    $_SESSION['errors']= $errors;

    header("location:../../products.php?products=add");
}











}else{
    header("location:../../products.php?products=add");
}