<?php

try {

    $stms = $con->prepare("INSERT INTO `products` (`Product_ID`, `Product_Name`, `Product_Desc`,  `Product_Purchase_Price`, `Product_Sale_Price`, `Product_Tax_Percent`, `Product_discount_Percent`, `Product_Images`, `Product_Overview`, `Product_Attributes`, `Product_Brand_id`, `Product_Shipping_Price`)   VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?)");

    $serimage = serialize(['default.png']);

    $imgsr = $_FILES['Product_Images']["name"][0] == null ? $serimage:uploadFile($_FILES['Product_Images']);

    $stms->execute([
        $_POST['Product_Name'],
        $_POST['Product_Desc'],
        $_POST['Product_Purchase_Price'],
        $_POST['Product_Sale_Price'],
        $_POST['Product_Tax_Percent'],
        $_POST['Product_discount_Percent'],
        $imgsr,
        $_POST['Product_Overview'],
        $_POST['Product_Attributes'],
        $_POST['Product_Brand_id'],
        $_POST['Product_Shipping_Price'],
    ]);

    $last_id = $con->lastInsertId();

    for ($i=0; $i < count($_POST['Product_Options']) ; $i++) { 
        $stms = $con->prepare("INSERT INTO `product_option`(`Option` , `Product`) VALUES (?,?)");
        $stms->execute([
            $_POST['Product_Options'][$i],
            $last_id,
        ]);
    }

    for ($i=0; $i < count($_POST['Product_Categories']) ; $i++) { 
        $stms = $con->prepare("INSERT INTO `product_category`(`Product`, `Category`) VALUES (?,?)");
        $stms->execute([
            $last_id,
            $_POST['Product_Categories'][$i],
        ]);
    }
    
    Noty("Added Success");
    header("refresh:1;url=product.php");

} catch (PDOException $e) {
    
    Noty($e->getMessage() , 'error');
    
    header("refresh:1;url=product.php");
}

?>




