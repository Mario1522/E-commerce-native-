<?php
session_start();
include '../../dashnoard/functions/connection.php';
extract($_POST);
$query="select * from users where email = '$email'";
$run = mysqli_query($connection,$query);
if($run){
    if(mysqli_num_rows($run) == 1){
        $user = mysqli_fetch_assoc($run);
        if(password_verify($password,$user['password'])){
            $_SESSION["login-user"] = $user;
            header("location:../../index.php");
        }else{
            header("location:../../login.php");
        }
    }else{
        header("location:../../login.php");
    }
}
