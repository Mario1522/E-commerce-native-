<?php
session_start();
$userId = $_SESSION['login-user']['id'];
include '../../dashnoard/functions/connection.php';
extract($_POST);
$query = "DELETE FROM `cart` WHERE id = $id";
$run = mysqli_query($connection,$query);
$run = mysqli_query($connection,$query);
$select = "select * from cart where userID = $userId";
$r = mysqli_query($connection,$select);
echo $num = mysqli_num_rows($r);