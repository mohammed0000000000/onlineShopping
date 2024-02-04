<?php

include("configure.php");

$name = $_GET['name'];
$image = $_GET['image'];
$price = $_GET['price'];

$query = "DELETE FROM items where name = '$name' and image ='$image' and price = '$price'";
mysqli_query($conn, $query);
header("location:../cart.php");

?>