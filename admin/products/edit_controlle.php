<?php
    $stms = $con->prepare("SELECT * FROM `categories` WHERE Parent_Category is null");
    $stms->execute();
    $MainCat = $stms->fetchAll();
    $supcats = array();

    foreach ($MainCat as $cat) {
        $stms = $con->prepare("SELECT * FROM `categories` WHERE Parent_Category = {$cat['Cateory_ID']}");
        $stms->execute();
        $supcats[$cat['Category_Name']] = $stms->fetchAll();
    }

    
    $stms = $con->prepare("SELECT * FROM `brands` WHERE 1");
    $stms->execute();
    $Brands = $stms->fetchAll();
   


    $stms = $con->prepare("SELECT * FROM `products` WHERE Product_ID = {$_GET['id']}");
    $stms->execute();
    $product = $stms->fetch();

    $stms = $con->prepare("SELECT * FROM `options_groups` WHERE 1");
    $stms->execute();
    $MainOptions = $stms->fetchAll();
    $Options = array();

    foreach ($MainOptions as $option) {
        $stms = $con->prepare("SELECT * FROM `options` WHERE Option_Option_Grouo_id = {$option['Option_Group_ID']}");
        $stms->execute();
        $Options[$option['Option_Group_Name']] = $stms->fetchAll();
    }

    $stms = $con->prepare("SELECT `Option` FROM product_option WHERE Product = {$_GET['id']}");
    $stms->execute();
    $product['Options_ids'] = $stms->fetchAll();

    $stms = $con->prepare("SELECT `Category` FROM product_category WHERE product_category.Product = {$_GET['id']}");
    $stms->execute();
    $product['categories_ids'] = $stms->fetchAll();
?>