<?php
include("php/configure.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/productStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Online Shopping |Shopping</title>
</head>

<body>
    <header>
        <a href="cart.php"><span>MyCart</span><i class="fa-solid fa-cart-shopping" style="color: #FFD43B;"></i></a>
    </header>
    <center class="title">
        <h1>All Products</h1>
    </center>
    <div class="container">
        <?php 
    $query = "SELECT * from product";
    $products = mysqli_query($conn,$query);
    while($product = mysqli_fetch_array($products,MYSQLI_ASSOC)){
        foreach($product as $key => $value){
            $$key = $value;
        }
        echo <<< here
            <div class="item">
            <img src='$image'>
            <h2>$product[name]</h2>
            <p>$$product[price]</p>
            <a href="confirmShopping.php?id=$Id"><button class ="edit" style="width:70%;">Add To Cart</button></a>
            </div>
        here;
    }
    ?>
    </div>
</body>

</html>