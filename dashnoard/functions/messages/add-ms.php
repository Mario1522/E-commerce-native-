<?php
include '../connection.php';

extract($_POST);

$query = "INSERT INTO messages
(`name`, `email`, `phone`, `messages`, `status`) 
VALUES 
('$name','$email','$phone','$message','0')";

$run = mysqli_query($connection,$query);

echo "<div class='alert alert-success'>Inserted</div>";
?>
