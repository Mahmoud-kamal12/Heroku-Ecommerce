<?php 

    $stms = $con->prepare("DELETE FROM `product_category` WHERE Product = {$_GET['id']}");
    $stms->execute();

    $stms = $con->prepare("DELETE FROM `products` WHERE Product_ID = {$_GET['id']}");
    $stms->execute();

    Noty("Deleted Success");
    header("refresh:1;url=product.php");
    
?>