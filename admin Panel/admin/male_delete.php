<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from male where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('Male Driver Has Been Deleted Successfully');
window.location.href='male.php';
</script>";
?>