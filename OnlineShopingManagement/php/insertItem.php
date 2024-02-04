<?php
include('configure.php');
include('../validation/valid.php');
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['upload'])){

        $productName = $_POST['product-name'];
        $productPrice = $_POST['product-price'];
        $productImage = 'product-image';
        $errors = [];
        if(!validInput($productName)){
            $errors['name_error'] = "You Must Enter Name for Product";
        }
        if(!validInput($productPrice)){
            $errors['price_error'] = "You Must Enter Price for Product";
        }
        if(validFile($productImage)){
            $errors['image_error'] = "You Must Choose Photo for Product";
        }

        if(empty($errors)){
            
            $image_location = $_FILES[$productImage]['tmp_name'];
            $image_name = $_FILES[$productImage]['name'];
            $image_load = "Gallary/" . $image_name;
            
            $query_find = "SELECT * from product where name= '$productName' AND price = '$productPrice' AND image = '$image_load' ";
            $flag = mysqli_query($conn,$query_find);
            if($flag ->num_rows > 0){
                $_SESSION['database_error'] = "This Item Already Exist";
                header("location:../index.php");
            }

            $query_insert = "INSERT into product (name,price,image) values ('$productName','$productPrice','$image_load')";
            $flag = mysqli_query($conn, $query_insert);

            if(file_exists('Gallary'))mkdir("Gallary");

            if(move_uploaded_file($image_location,'../Gallary/'. $image_name)){
                echo "<script>alert('Insertion Item Successful')</script>";
            }
            else{
                echo "<script>alert('Insertion Item Failed')</script>";
            }
            header("location:../index.php");
        }
        else{
            $_SESSION['user-errors'] = $errors;
            header("location:../index.php");
        }
        // $query = "insert into product (name,price,image) values ('$productName','$productPrice','$image_up')";
    }
}
?>