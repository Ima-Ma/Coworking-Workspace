<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from female where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('Female Driver Has Been Deleted Successfully');
window.location.href='female.php';
</script>";
?>