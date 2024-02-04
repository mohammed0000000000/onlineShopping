<?php
include("configure.php");
session_start();
$id = $_GET['id'];
echo $id .'<br>';
$query = "DELETE from product where id = '$id'";
$check = mysqli_query($conn, $query);
$_SESSION['delete_item'] = "Item Deleted Successful";

header("location:../products.php");
?>