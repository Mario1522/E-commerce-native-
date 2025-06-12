<?php
session_start();
include '../../dashnoard/functions/connection.php';

$userId = $_SESSION['login-user']['id'];

extract($_POST);


$cart = "select * from cart where `productID` = '$proId' and `userID` = '$userId' ";

$run = mysqli_query($connection,$cart);

 $num = mysqli_num_rows($run);

$select = "select * from products where id = $proId";

$r_pro = mysqli_query($connection,$select);

$pro = mysqli_fetch_assoc($r_pro);

$price = $pro['price'];




if($num == 0){
    $insert = "INSERT INTO `cart`
    (`productID`, `userID`, `count`, `total`) 
    VALUES
     ('$proId','$userId','1','$price')";

    $r_insert = mysqli_query($connection,$insert);
 }
 
 else{
    $number = mysqli_fetch_assoc($run);
    $count = $number['count'];
    $count++;
    $total = $count * $price;
    $update = "UPDATE `cart` 
    SET `count`='$count',`total`='$total' where `productID` = '$proId' and `userID` = '$userId'";
    $r_update = mysqli_query($connection,$update);
}

$totalCart = "select sum(total) as totalCart from cart where userID = $userId";

$runTotal = mysqli_query($connection,$totalCart);

$sum = mysqli_fetch_assoc($runTotal);

echo $finalResult = $sum['totalCart'];