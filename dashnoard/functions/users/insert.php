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

    $q = "select * from users where `email` = '$email'";
    $r = mysqli_query($connection,$q);
    $num = mysqli_num_rows($r);


    
    if(empty($email)){
        $errors['email']="Enter email";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']="Enter Valid email";
    }elseif($num != 0){
        $errors["email"]="email is already exist";
    }



    if(empty($password)){
        $errors['password']="Enter password";
    }elseif(strlen($password) < 5){
        $errors['password']="Enter Valid password";
    }


    if(empty($errors)){
        $pass_hash = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO`users`
        ( `name`, `email`, `password`, `role`, `gender`) 
        VALUES
        ('$name','$email','$pass_hash','$role','$gender')";
        $run = mysqli_query($connection,$query);
        if($run){
            header("location:../../users.php");
        }
    }else{
        $_SESSION["errors"]=$errors;
        header("location:../../users.php?users=add");
    }

}else{
    header("location:../../users.php?users=add");
}