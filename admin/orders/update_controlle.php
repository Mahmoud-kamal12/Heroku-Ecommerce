<?php 

try {


    $stms = $con->prepare("UPDATE `orders` SET `Order_Status` = '{$_POST['Order_Status']}' WHERE `orders`.`Order_ID` = ?;");
    $stms->execute([
        $_POST['Order_ID']
    ]);


    Noty("Updated Success");
    $page = "order.php?do=Show&order_id={$_POST['Order_ID']}&user_id={$_POST['user_id']}";
    header("refresh:1;url={$page}");
    
} catch (\PDOException $e) {

    echo $e ;
    
}

?>