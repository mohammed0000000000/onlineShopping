<?php
include("php/showItemdata.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Online Shopping | Update Item</title>
</head>

<body>
    <div class="control">
        <div class="container">
            <form action="php/updateItem.php" method="POST" enctype="multipart/form-data">
                <h2>Online Shopping</h2>
                <input type="text" name="product-id" id="" value="<?php echo $Id?>" readonly>
                <input type="text" name="product-name" id="" value="<?php echo $name?>">
                <input type="text" name="product-price" id="" value="<?php echo $price?>">
                <br>
                <input type="file" name="product-image" id='file' value="" id="" style="display: none;">
                <label for="file" class="fileButton">change Product Photo</label>
                <input type="submit" value="Update Product" name="update">
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