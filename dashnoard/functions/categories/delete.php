<?php
include "../connection.php";
$id = $_GET["id"];
$query = "DELETE FROM category WHERE id = '$id'";
$run = mysqli_query($connection,$query);
header("location:../../categories.php");