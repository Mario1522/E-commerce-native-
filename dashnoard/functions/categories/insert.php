<?php
session_start();
include '../connection.php';

if(isset($_POST["add"])){
    extract($_POST);
    
    $errors=[];
    if(empty($name)){
        $errors['name']="Enter Name";
    }elseif(strlen($name) < 3){
        $errors['name']="Enter Valid Name";
    }



     


    if(empty($errors)){
        $query = "INSERT INTO `category`
        (`name`) 
        VALUES
         ('$name')";
        $run = mysqli_query($connection,$query);
        if($run){
            header("location:../../categories.php");
        }
    }else{
        $_SESSION["errors"]=$errors;
        header("location:../../categories.php?categories=add");
    }

}else{
    header("location:../../categories.php?categories=add");
}