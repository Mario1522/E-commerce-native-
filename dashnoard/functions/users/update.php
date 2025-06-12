<?php
session_start();


include '../connection.php';

$id = $_GET['id'];





if(isset($_POST['edit'])){



extract($_POST);




$errors=[];


if(empty($name)){
    $errors["name"] = "Enter Name";
}elseif(strlen($name) < 3){
    $errors["name"] = "Enter Valid Name";
}





$q = "select * from users where `email` = '$email' and id != $id";
$r = mysqli_query($connection,$q);
$num = mysqli_num_rows($r);


if(empty($email)){
    $errors["email"] = "Enter email";
}
elseif(! filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors["email"] = "Enter Valid email";
}elseif($num != 0 ){
    $errors["email"] = "Email already exist";
}


$roles=['user','admin'];
if(! in_array($role , $roles)){
    $errors["role"] = "Enter Valid Role";
}


$genders=['male','female'];
if(! in_array($gender , $genders)){
    $errors["gender"] = "Enter Valid Gender";
}





if(empty($errors)){
   $query = "UPDATE `users` SET 
   `name`='$name',`email`='$email',`role`='$role',`gender`='$gender' WHERE `id` = $id";

    $run = mysqli_query($connection,$query);


if($run){
header("location:../../users.php");
}


}else{
$_SESSION["errors"] = $errors;
header("location:../../users.php?users=edit&id=$id");
}
}

else{
header("location:../../users.php)");
}

?>