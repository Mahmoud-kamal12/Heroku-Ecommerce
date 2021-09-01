<?php 

try {



    $stms = $con->prepare("SELECT Product_Images FROM products WHERE Product_ID = {$_POST['Product_ID']} ");
    $stms->execute();
    $row = $stms->fetch();
    $sr = ($row['Product_Images'] === 'default.png') ? serialize(['default.png']) : $row['Product_Images'];
    $imgsr = $_FILES['Product_Images']["name"][0] == null ? $sr : uploadFile($_FILES['Product_Images']);

    if(!($_FILES['Product_Images']["name"][0] == null)){
        if ( $row['Product_Images']) {
            deletFile(unserialize($row['Product_Images']));
        }
    }
    

    $stms = $con->prepare("UPDATE `products` SET `Product_Name`=?,`Product_Desc`=?,`Product_Purchase_Price`=?,`Product_Sale_Price`=?,`Product_Tax_Percent`=?,`Product_discount_Percent`=?,`Product_Images`=?,`Product_Overview`=?,`Product_Attributes`=?,`Product_Brand_id`=?,`Product_Shipping_Price`=? WHERE Product_ID = {$_POST['Product_ID']}");
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

    $stms = $con->prepare("SELECT Category FROM `product_category` WHERE Product = {$_POST['Product_ID']}");
    if ($stms->execute()) {
        $stms = $con->prepare("DELETE FROM `product_category` WHERE Product = {$_POST['Product_ID']}");
        $stms->execute();
    }
    for ($i=0; $i < count($_POST['Product_Categories']) ; $i++) { 
        $stms = $con->prepare("INSERT INTO `product_category`(`Product`, `Category`) VALUES (?,?)");
        $stms->execute([
            $_POST['Product_ID'],
            $_POST['Product_Categories'][$i],
        ]);
    }

    $stms = $con->prepare("SELECT `Option` FROM `product_option` WHERE Product = {$_POST['Product_ID']}");
    if ($stms->execute()) {
        $stms = $con->prepare("DELETE FROM `product_option` WHERE Product = {$_POST['Product_ID']}");
        $stms->execute();
    }
    
    for ($i=0; $i < count($_POST['Product_Options']) ; $i++) { 
        $stms = $con->prepare("INSERT INTO `product_option`(`Product`, `Option`) VALUES (?,?)");
        $stms->execute([
            $_POST['Product_ID'],
            $_POST['Product_Options'][$i],
        ]);
    }

    Noty("Updated Success");
    header("refresh:1;url=product.php");
    
} catch (\PDOException $e) {
    echo $e ;
}

?>