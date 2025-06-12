<?php
session_start();
include '../connection.php';
$id = $_GET['id'];

$q = "select * from products where id = $id";

$r = mysqli_query($connection,$q);

$product = mysqli_fetch_assoc($r);

$old_imgs = explode("+",$product['image']);


if(isset($_POST['submit'])){

    extract($_POST);

    $errors=[];

    if(empty($name)){
        $errors['name']="Please Enter Name";
    }elseif(strlen($name) < 3){
        $errors['name']="Please Enter Valid Name";
    }
    
    
    if(empty($price)){
        $errors['price'] = "Please Enter Price";
    }elseif(! is_numeric($price)){
        $errors['price'] = "Please Enter Valid Price";
    }elseif($price <= 0){
        $errors['price'] = "Please Enter Valid Price";
    }
    
    
    if(empty($sale)){
        $errors['sale'] = "Please Enter sale";
    }elseif(! is_numeric($sale)){
        $errors['sale'] = "Please Enter Valid sale";
    }elseif($sale < 0){
        $errors['sale'] = "Please Enter Valid sale";
    }
    
    
    
    if(empty($count)){
        $errors['count'] = "Please Enter count";
    }elseif(! is_numeric($count)){
        $errors['count'] = "Please Enter Valid count";
    }elseif($price <= 0){
        $errors['count'] = "Please Enter Valid count";
    }
    
    
    
    if(empty($cat)){
        $errors['cat']="Please Enter cat";
    }elseif(strlen($cat) < 3){
        $errors['cat']="Please Enter Valid cat";
    }
    
    
    
    $images = $_FILES['img']['name'];
    $total_errs = 0;
    foreach ($images as $key => $value) {
        $total_errs += $_FILES['img']['error'][$key];
    }

    if($total_errs == 0){
    
        
        if(empty($errors)){
            
            
            
            
            $ext = ['jpg','png','jpeg'];
    
            foreach ($images as $key => $value) {
                $extention = pathinfo($_FILES['img']['name'][$key],PATHINFO_EXTENSION);
                if(! in_array($extention,$ext)){
                    $errors['img']= "Enter Valid Image";
                    $_SESSION['errors'] = $errors;
                    header("location:../../products.php?products=edit&id=$id");
                }else{
                    $img_name = uniqid() . '.' . $extention;
                    move_uploaded_file($_FILES['img']['tmp_name'][$key],"../../images/$img_name");
                    $all[]= $img_name;
                }
            }


            
            $imgs = implode("+",$all);
            $query = "UPDATE `products` SET 
            `name`='$name',`price`='$price',`sale`='$sale',`count`='$count',`category`='$cat',`image`='$imgs' WHERE id = $id";
            $run = mysqli_query($connection,$query);
            if($run){
                foreach ($old_imgs as $key => $value) {
                    unlink("../../images/$value");
                }
                header("location:../../products.php");
            }
        }else{
            $_SESSION['errors'] = $errors;
            header("location:../../products.php?products=edit&id=$id");
        }




















    }else{
        if(empty($errors)){
            
            
            $query = "UPDATE `products` SET 
            `name`='$name',`price`='$price',`sale`='$sale',`count`='$count',`category`='$cat' WHERE id = $id";
            $run = mysqli_query($connection,$query);
            if($run){
                header("location:../../products.php");
            }
        }else{
            $_SESSION['errors'] = $errors;
            header("location:../../products.php?products=edit&id=$id");
        }
    }



















}else{
    header("location:../../products?products=adit");
}