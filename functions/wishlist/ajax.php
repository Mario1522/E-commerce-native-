<?php
session_start();
include '../../dashnoard/functions/connection.php';

$userId = $_SESSION['login-user']['id'];

extract($_POST);

$wish =  "select * from wishlist where `productID` = '$proId' and `userID` = '$userId' ";

$run = mysqli_query($connection,$wish);

$num = mysqli_num_rows($run);

if($num == 0){
    $insert = "INSERT INTO `wishlist`
    (`userID`, `productID`) 
    VALUES 
    ('$userId','$proId')";

    $r = mysqli_query($connection,$insert);
    echo "<div class='alert alert-success mt-3 w-25'>added</div>";
}else{
    echo "<div class='alert alert-danger mt-3 w-25'>added before</div>";
}