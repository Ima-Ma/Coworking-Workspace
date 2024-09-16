<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from pick_n_drop_record where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('Transportation Record Has Been Deleted Successfully');
window.location.href='record.php';
</script>";
?>