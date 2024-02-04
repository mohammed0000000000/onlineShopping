<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$database = "onlineShopping";

$conn = new mysqli($serverName,$userName,$password,$database);
if($conn ->connect_error){
    die("Connection Failed : " . $conn->connect_error);
}
?>