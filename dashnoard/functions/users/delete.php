<?php
include "../connection.php";
$id = $_GET["id"];
$query = "DELETE FROM users WHERE id = '$id'";
$run = mysqli_query($connection,$query);
header("location:../../users.php");