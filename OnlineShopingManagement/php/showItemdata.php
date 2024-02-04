<?php
include("configure.php");
$id = $_GET['id'];
$query = "SELECT * FROM product where id ='$id'";
$product = mysqli_fetch_array(mysqli_query($conn, $query),MYSQLI_ASSOC);
foreach($product as $key => $value){
    $$key = $value;
}
?>