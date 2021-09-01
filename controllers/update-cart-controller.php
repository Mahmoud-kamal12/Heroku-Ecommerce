<?php
session_start();
include "../admin/connect.php";
include "../includes/functions/functions.php";


if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && isset($_POST['id'])) {


        try {
            $sql = "UPDATE cart SET Quantity = ? WHERE cart.Cart_ID = ?";
            $stms = $con->prepare($sql);
            $q = $_POST['Quantity'] ?? 1;
            $data = [
                $q,
                $_POST['id'],
            ];
            $stms->execute($data);
    
            $page = "../shopping-cart";
            $msg = "Quantity updated successfuly";
            header("Location:$page.php?err=2&msg={$msg}");
        } catch (\PDOException $e) {

            $msg = $e->getMessage();
            $page = "../shopping-cart";
            header("Location:$page.php?err=1&msg={$msg}");
            
        }


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