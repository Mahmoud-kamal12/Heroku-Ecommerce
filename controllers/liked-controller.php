<?php

session_start();
include "../admin/connect.php";
include "../includes/functions/functions.php";


if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET' && isset($_GET['id'])) {

        try {
            $sql = "INSERT INTO `product_wish`(`User`, `Product`) VALUES (?,?)";
            $stms = $con->prepare($sql);
            $stms->execute([
                $_SESSION['ID'],
                $_GET['id']
            ]);
    
            $page = "../liked-products";
            $msg = "Product added successfuly";
            header("Location:$page.php?err=2&msg={$msg}");

        } catch (\PDOException $e) {
            
            if ($e->errorInfo[1] == 1062) {
                $msg = "This product has been added before.";
                $page = "../liked-products";
                header("Location:$page.php?err=1&msg={$msg}");
             } else {
                $msg = $e->getMessage();
                $page = "../liked-products";
                header("Location:$page.php?err=1&msg={$msg}");
             }

        }
    }else{
        $page = "../shop";
        header("Location:$page.php");
    }
}else{
    $msg = "you must login to can like product";
    $page = "../login";
    header("Location:$page.php?err=1&msg={$msg}");
}

?>
