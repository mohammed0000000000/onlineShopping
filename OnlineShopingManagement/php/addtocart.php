<?php
include("configure.php");
$id = $_GET['id'];
$id = (int)$id;
// echo $id ." ". gettype($id) ;

$query = "SELECT name,price,image from product where id ='$id' ";

$product = mysqli_query($conn, $query);
$product = mysqli_fetch_array($product,MYSQLI_ASSOC);

foreach($product as $key => $val){
    $$key = $val;
}

$query = "INSERT into items (name,price,image) values('$name','$price','$image')";
$item = mysqli_query($conn, $query);
header("location: ../shopping.php");
?>