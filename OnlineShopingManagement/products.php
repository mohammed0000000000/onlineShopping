<?php 
    include("php/configure.php");
    session_start();

    
    if(isset($_SESSION['delete_item'])){
        $message = $_SESSION['delete_item'];
        echo "<script>alert('$message')</script>";
        unset($_SESSION['delete_item']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productStyle.css">
    <title>Product</title>
</head>

<body>
    <center class="title">
        <h1>All Products</h1>
    </center>
    <div class="container">
        <?php 
    $query = "SELECT * from product";
    $products = mysqli_query($conn,$query);
    while($product = mysqli_fetch_array($products,MYSQLI_ASSOC)){
        // echo "<pre>";
        //     print_r($product);
        // echo "</pre>";
        foreach($product as $key => $value){
            $$key = $value;
        }
        echo <<< here
            <div class="item">
            <img src='$image'>
            <h2>$product[name]</h2>
            <p>$$product[price]</p>
            <a href="updateProduct.php?id=$Id"><button class ="edit" >Edit</button></a>
            <a href="php/deleteItem.php?id=$Id"><button class = "remove" >Remove</button></a>
            </div>
        here;
    }
    ?>
    </div>
</body>

</html>