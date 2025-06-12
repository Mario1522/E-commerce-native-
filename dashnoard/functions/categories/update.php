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





if(empty($errors)){
   $query = "UPDATE `category` SET `name`='$name' WHERE `id` = $id";

    $run = mysqli_query($connection,$query);


if($run){
header("location:../../categories.php");
}


}else{
$_SESSION["errors"] = $errors;
header("location:../../categories.php?categories=edit&id=$id");
}
}

else{
header("location:../../categories.php)");
}

?>