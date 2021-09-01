<?php
session_start();
include "../admin/connect.php";
include "../includes/functions/functions.php";

if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && isset($_POST['id'])) {


        try {
            
            $sql = "INSERT INTO `cart` (`Cart_ID`, `Cart_Date`, `Item`, `User` , `Quantity`) VALUES (NULL, current_timestamp(), ?, ? , ?)";
            $stms = $con->prepare($sql);
            $q = $_POST['Quantity'] ?? 1;
            $data = [
                $_POST['id'],
                $_SESSION['ID'],
                $q,
            ];
            $stms->execute($data);
    
            $page = "../shopping-cart";
            $msg = "Product added successfuly";
            header("Location:$page.php?err=2&msg={$msg}");

        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $msg = "This product has been added before.";
                $page = "../shopping-cart";
                header("Location:$page.php?err=1&msg={$msg}");
             } else {
                $msg = $e->getMessage();
                $page = "../shopping-cart";
                header("Location:$page.php?err=1&msg={$msg}");
             }
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