<?php
include('configure.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['update'])){
        
        $product_id = $_POST['product-id'];
        $product_name = $_POST['product-name'];
        $product_price = $_POST['product-price'];

        $query = "SELECT * FROM product where id = '$product_id' ";
        $product_oldvalue = mysqli_fetch_array(mysqli_query($conn, $query),MYSQLI_ASSOC);

        if($product_name !== $product_oldvalue['name']){
            $query = "UPDATE product SET name = '$product_name' where id = '$product_id'";
            mysqli_query($conn, $query);
        }

        if($product_price !== $product_oldvalue['price']){
            $query = "UPDATE product SET price = '$product_price' WHERE id = '$product_id'";
            mysqli_query($conn, $query);
        }

        if(!empty($_FILES['product-image']['name']) && ($_FILES['product-image']['name']) !== $product_oldvalue['image']){
            $pImage_name = $_FILES['product-image']['name'];
            $pImage_location = $_FILES['product-image']['tmp_name'];
            $location = "Gallary/" . $pImage_name;
            $query = "UPDATE product SET image = '$location' where id = '$product_id'";
            mysqli_query($conn, $query);

            if(move_uploaded_file($pImage_location, "../Gallary/" . $pImage_name)){
                $img_old_location = "../".$product_oldvalue['image'];
                if(unlink($img_old_location)){
                    echo "<script>alert('Success Updating Product')</script>";
                }
                else{
                    echo "<script>alert('Falid Updating Product 11')</script>";
                }
            }
            else{
                echo "<script>alert('Falid Updating Product')</script>";
            }
        }

    }
}
?>