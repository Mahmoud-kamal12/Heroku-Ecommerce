<?php

session_start();
include "../admin/connect.php";
include "../includes/functions/functions.php";

if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET' && $_GET['id']) {
        $sql = "DELETE FROM `product_wish` WHERE Wish_ID = ?";
        $stms = $con->prepare($sql);
        $stms->execute([
            $_GET['id']
        ]);
        $page = "../liked-products";
        $msg = "Product deleted successfuly";
        header("Location:$page.php?err=2&msg={$msg}");
    }else{
        $page = "../shop";
        header("Location:$page.php");
    }
}else{
    $msg = "you must login to can add to cart";
    $page = "../login";
    header("Location:$page.php?err=1&msg={$msg}");
}

?>