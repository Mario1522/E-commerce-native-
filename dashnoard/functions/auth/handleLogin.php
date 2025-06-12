<?php
session_start();
include '../connection.php';
extract($_POST);
$query="select * from users where email = '$email'";
$run = mysqli_query($connection,$query);
if($run){
    if(mysqli_num_rows($run) == 1){
        $user = mysqli_fetch_assoc($run);
        if(password_verify($password,$user['password'])){
            if($user['role']=='admin' || $user['role']=='owner'){
                $_SESSION["login"]=$user;
                header("location:../../index.php");
            }else{
                header("location:../../../index.php");
            }
        }else{
            header("location:../../login.php");
        }
    }else{
        header("location:../../login.php");
    }
}