<?php
include('php/configure.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/cartStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>
</head>

<body>
    <header>
        <a href="shopping.php"><i class="fa-solid fa-house"></i></a>
    </header>
    <div class="container">
        <h1>Your Products</h1>
        <?php
        $query = "SELECT * from items";
        $items = mysqli_query($conn, $query);
        

        while ($item = mysqli_fetch_array($items,MYSQLI_ASSOC)):
            echo <<< here
            <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>delete</th>
            </thead>
            <tbody>
                <tr>
                    <td><img src="$item[image]" alt=""></td>
                    <td>$item[name]</td>
                    <td>$item[price]</td>
                    <td><a href="php/deleteFromCart.php?name=$item[name]&price=$item[price]&image=$item[image]"><button>Delete</button></a></td>
                </tr>
            </tbody>
            </table>
            here;
        endwhile;
        ?>

    </div>
</body>

</html>