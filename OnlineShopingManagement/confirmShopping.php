<?php
    include("php/configure.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/confirmStyle.css">
    <title>Confirm Shopping</title>
</head>

<body>
    <div class="box">
        <?php
        $id = $_GET['id'];
        $query = "SELECT name,price,image FROM product where id ='$id'";
        $product = mysqli_query($conn, $query);
        $product = mysqli_fetch_array($product,MYSQLI_ASSOC);
        echo <<< HERE
        <img src='$product[image]'>
        <h2>You are Sure to buying 
        <span>$product[name]</span> <br> With Cost <span>$$product[price]</span>;
        <br>
        </h2>
        <a href="php/addtocart.php?id=$id"><button>Add to Shopping Cart</button></a>
        <a href="shopping.php">Go to Product Page</a>
        HERE;
        ?>
    </div>
</body>

</html>