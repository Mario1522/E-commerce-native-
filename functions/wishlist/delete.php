<?php
session_start();
$userId = $_SESSION['login-user']['id'];
include '../../dashnoard/functions/connection.php';
extract($_POST);
$query = "DELETE FROM `wishlist` WHERE id = $id";
$run = mysqli_query($connection,$query);
$select = "select * from wishlist where userID = $userId";
$r = mysqli_query($connection,$select);
echo $num = mysqli_num_rows($r);