<?php 
    $stms = $con->prepare("DELETE FROM `categories` WHERE `categories`.`Cateory_ID` = {$_GET['id']}");
    $stms->execute();
    Noty("Deleted Success");
    header("refresh:1;url=category.php");
    
?>