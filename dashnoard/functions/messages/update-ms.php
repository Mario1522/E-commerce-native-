<?php

include "../connection.php";

$id =$_POST["id"];

$query = "update messages set `status` = '1' where id= '$id'";

$run = mysqli_query($connection,$query);


$select = "select * from messages where `status` = '0' ";
$result = mysqli_query($connection,$select);
echo $num = mysqli_num_rows($result); 
