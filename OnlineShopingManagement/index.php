<?php
session_start();
$errors = [];
if(isset($_SESSION['user-errors'])){
    $errors = $_SESSION['user-errors'];
}

if(isset($_SESSION['database_error'])){
    $error = $_SESSION['database_error'];
    echo "<script> alert('$error')</script>";
    unset($_SESSION['database_error']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Online Shopping | Add Item</title>
</head>

<body>
    <div class="control">
        <div class="container">
            <form action="php/insertItem.php" method="POST" enctype="multipart/form-data">
                <h2>Online Shopping</h2>
                <div class="image">
                    <img src="images/onlineshopping.jpg" alt="">
                </div>
                <?php 
                if(!empty($errors && isset($errors['name_error']))) {
                    $error = $errors['name_error'];
                    echo "<div style = 'color: red; margin: 5px;font-size: 14px;'>*  $error</div>";
                }
                ?>
                <input type="text" name="product-name" id="" placeholder="Product Name">
                <div class="error-message">
                    <?php 
                if(!empty($errors && isset($errors['price_error']))){
                    $error = $errors['price_error'] ;
                    echo "<div style = 'color: red; margin: 5px;font-size: 14px;'>*  $error</div>";
                }  
                ?>
                </div>
                <input type="text" name="product-price" id="" placeholder="Product Price">
                <div class="error-message">
                    <?php if(!empty($errors && isset($errors['image_error']))){
                    $error =  $errors['image_error'];
                    echo "<div style = 'color: red; margin: 5px;font-size: 14px;'>*  $error</div>";
                }
                ?>
                </div>
                <input type="file" name="product-image" id='file' value="" id="" style="display: none;">
                <label for="file" class="fileButton">Choose Product Photo</label>
                <?php
                if(isset($_SESSION['user-errors'] ))unset($_SESSION['user-errors']);
                ?>

                <input type="submit" value="Add Product" name="upload">
            </form>
            <div>
                <a href="products.php">
                    <h4>Display All Products</h4>
                </a>
            </div>
            <!-- <p>Devoloper By Muhammed</p> -->
        </div>
    </div>
</body>

</html>